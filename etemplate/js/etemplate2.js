/**
 * EGroupware eTemplate2 - JS file which contains the complete et2 module
 *
 * @license http://opensource.org/licenses/gpl-license.php GPL - GNU General Public License
 * @package etemplate
 * @subpackage api
 * @link http://www.egroupware.org
 * @author Andreas Stöckel
 * @copyright Stylite 2011
 * @version $Id$
 */

/*egw:uses
	// Include all widget classes here
	et2_widget_template;
	et2_widget_grid;
	et2_widget_box;
	et2_widget_hbox;
	et2_widget_groupbox;
	et2_widget_button;
	et2_widget_color;
	et2_widget_description;
	et2_widget_textbox;
	et2_widget_number;
	et2_widget_url;
	et2_widget_selectbox;
	et2_widget_checkbox;
	et2_widget_radiobox;
	et2_widget_date;
	et2_widget_styles;
	et2_widget_html;
	et2_widget_tabs;
	et2_widget_tree;
	et2_widget_hrule;
	et2_widget_image;
	et2_widget_file;
	et2_widget_link;
	et2_widget_progress;
	et2_widget_selectAccount;
	et2_widget_ajaxSelect;
	et2_widget_vfs;

	et2_extension_nextmatch;
	et2_extension_customfields;

	// Requirements for the etemplate2 object
	et2_core_common;
	et2_core_xml;
	et2_core_arrayMgr;
	et2_core_interfaces;
	et2_core_legacyJSFunctions;

	// Include the client side api core
	jsapi.egw_core;
	jsapi.egw_json;
*/

/**
 * The etemplate2 class manages a certain etemplate2 instance.
 *
 * @param _container is the DOM-Node into which the DOM-Nodes of this instance
 * 	should be inserted
 * @param _submitURL is the URL to which the form data should be submitted.
 */
function etemplate2(_container, _menuaction)
{
	if (typeof _menuaction == "undefined")
	{
		_menuaction = "etemplate::ajax_process_content";
	}

	// Copy the given parameters
	this.DOMContainer = _container;
	this.menuaction = _menuaction;

	// Preset the object variable
	this.widgetContainer = null;

	// List of templates (XML) that are known, but not used.  Indexed by id.
	this.templates = {};

	// Connect to the window resize event
	$j(window).resize(this, function(e) {e.data.resize()});
}

/**
 * Calls the resize event of all widgets
 */
etemplate2.prototype.resize = function()
{
	if (this.widgetContainer)
	{
		// Call the "resize" event of all functions which implement the
		// "IResizeable" interface
		this.widgetContainer.iterateOver(function(_widget) {
			_widget.resize();
		}, this, et2_IResizeable);
	}
}

/**
 * Clears the current instance.
 */
etemplate2.prototype.clear = function()
{
	if (this.widgetContainer != null)
	{
//		$j(':input',this.DOMContainer).validator().data("validator").destroy();
		this.widgetContainer.free();
		this.widgetContainer = null;
	}
	this.templates = {};
}

/**
 * Creates an associative array containing the data array managers for each part
 * of the associative data array. A part is something like "content", "readonlys"
 * or "sel_options".
 */
etemplate2.prototype._createArrayManagers = function(_data)
{
	if (typeof _data == "undefined")
	{
		_data = {};
	}

	// Create all neccessary _data entries
	var neededEntries = ["content", "sel_options", "readonlys", "modifications",
		"validation_errors"];
	for (var i = 0; i < neededEntries.length; i++)
	{
		if (typeof _data[neededEntries[i]] == "undefined" || !_data[neededEntries[i]])
		{
			egw.debug("log", "Created not passed entry '" + neededEntries[i] +
				"' in data array.");
			_data[neededEntries[i]] = {};
		}
	}

	var result = {};

	// Create an array manager object for each part of the _data array.
	for (var key in _data)
	{
		switch (key) {
			case "etemplate_exec_id":	// already processed
			case "app_header":
				break;
			case "readonlys":
				result[key] = new et2_readonlysArrayMgr(_data[key]);
				break;
			default:
				result[key] = new et2_arrayMgr(_data[key]);
		}
	}

	return result;
}

/**
 * Loads the template from the given URL and sets the data object
 */
etemplate2.prototype.load = function(_name, _url, _data)
{

	egw().debug("info", "Loaded data", _data);

	// Appname should be first part of the template name
	var split = _name.split('.');
	var appname = split[0];

	// Create the document fragment into which the HTML will be injected
	var frag = document.createDocumentFragment();

	// Asynchronously load the XET file (code below is executed ahead of the
	// code in the callback function)
	et2_loadXMLFromURL(_url, function(_xmldoc) {

		// Scan for templates and store them
		for(var i = 0; i < _xmldoc.childNodes.length; i++) {
			var template = _xmldoc.childNodes[i];
			if(template.nodeName.toLowerCase() != "template") continue;
			this.templates[template.getAttribute("id")] = template;
		}

		// Read the XML structure of the requested template
		this.widgetContainer.loadFromXML(this.templates[_name]);

		// Inform the widget tree that it has been successfully loaded.
		this.widgetContainer.loadingFinished();

		// Insert the document fragment to the DOM Container
		this.DOMContainer.appendChild(frag);

		// Trigger the "resize" event
		this.resize();
	}, this);

	// Clear any existing instance
	this.clear();

	// Create the basic widget container and attach it to the DOM
	this.widgetContainer = new et2_container(null);
	this.widgetContainer.setApiInstance(egw(appname, egw.elemWindow(this.DOMContainer)));
	this.widgetContainer.setInstanceManager(this);
	this.widgetContainer.setParentDOMNode(this.DOMContainer);

	// store the id to submit it back to server
	if(_data) {
		this.etemplate_exec_id = _data.etemplate_exec_id;
	}
	
	// set app_header
	if (window.opener) {	// popup
		document.title = _data.app_header;
	} else {
		// todo for idots or jdots framework
	}

	// Split the given data into array manager objects and pass those to the
	// widget container
	this.widgetContainer.setArrayMgrs(this._createArrayManagers(_data));
}

etemplate2.prototype.submit = function(button)
{
	// Validator
	/*var valid = true;
	var inputs = $j(':input',this.DOMContainer).each(function() {
		if(typeof $j(this).data("validator") == "undefined") return true;
		valid = valid && $j(this).data("validator").checkValidity();
		return true;
	});
	if(!valid) return false;*/

	// Get the form values
	var values = this.getValues(this.widgetContainer);

	// Trigger the submit event
	var canSubmit = true;
	this.widgetContainer.iterateOver(function(_widget) {
		if (_widget.submit(values) === false)
		{
			canSubmit = false;
		}
	}, this, et2_ISubmitListener);

	if (canSubmit)
	{
		// Button parameter used for submit buttons in datagrid
		// TODO: This should probably go in nextmatch's getValues(), along with selected rows somehow.
		// I'm just not sure how.
		if(button && !values.button)
		{
			values.button = button.id
			var path = button.getPath();
			var target = values;
			for(var i = 0; i < path.length; i++)
			{
				if(!values[path[i]]) values[path[i]] = {};
				target = values[path[i]];
			}
			if(target != values) 
			{
				var indexes = button.id.split('[');
				if (indexes.length > 1)
				{
					indexes = [indexes.shift(), indexes.join('[')];
					indexes[1] = indexes[1].substring(0,indexes[1].length-1);
					var children = indexes[1].split('][');
					if(children.length)
					{
						indexes = jQuery.merge([indexes[0]], children);
					}
				}
				var idx = '';
				for(var i = 0; i < indexes.length; i++)
				{
					idx = indexes[i];
					if(!target[idx] || target[idx]['$row_cont']) target[idx] = i < indexes.length -1 ? {} : true;
					target = target[idx];
				}
			}
		}

		// Create the request object
		if (typeof egw_json_request != "undefined" && this.menuaction)
		{
			var api = this.widgetContainer.egw();
			var request = api.json(this.menuaction, [this.etemplate_exec_id,values], null, this);
			request.sendRequest();
		}
		else
		{
			egw.debug("info", "Form got submitted with values: ", values);
		}
	}
}

/**
 * Does a full form post submit.
 * Only use this one if you need it, use the ajax submit() instead
 */
etemplate2.prototype.postSubmit = function()
{
	// Get the form values
	var values = this.getValues(this.widgetContainer);

	// Trigger the submit event
	var canSubmit = true;
	this.widgetContainer.iterateOver(function(_widget) {
		if (_widget.submit(values) === false)
		{
			canSubmit = false;
		}
	}, this, et2_ISubmitListener);

	if (canSubmit)
	{
		var form = jQuery("<form id='form' action='"+egw().webserverUrl + 
			"/etemplate/process_exec.php?menuaction=" + this.widgetContainer.egw().getAppName()+ "' method='POST'>");

		var etemplate_id = jQuery(document.createElement("input"))
			.attr("name",'etemplate_exec_id')
			.val(this.etemplate_exec_id)
			.appendTo(form);

		var input = document.createElement("input");
		input.type = "hidden";
		input.name = 'value';
		input.value = egw().jsonEncode(values);
		form.append(input);
		form.appendTo(jQuery('body')).submit();
	}
}

/**
 * Fetches all input element values and returns them in an associative
 * array. Widgets which introduce namespacing can use the internal _target
 * parameter to add another layer.
 */
etemplate2.prototype.getValues = function(_root)
{
	var result = {};

	// Iterate over the widget tree
	_root.iterateOver(function(_widget) {

		// The widget must have an id to be included in the values array
		if (_widget.id == "")
		{
			return;
		}

		// Get the path to the node we have to store the value at
		var path = _widget.getPath();
		
		// check if id contains a hierachical name, eg. "button[save]"
		var id = _widget.id;
		var indexes = id.split('[');
		if (indexes.length > 1)
		{
			indexes = [indexes.shift(), indexes.join('[')];
			indexes[1] = indexes[1].substring(0,indexes[1].length-1);
			var children = indexes[1].split('][');
			if(children.length)
			{
				indexes = jQuery.merge([indexes[0]], children);
			}
			path = path.concat(indexes);
			// Take the last one as the ID
			id = path.pop();
		}

		// Set the _target variable to that node
		var _target = result;
		for (var i = 0; i < path.length; i++)
		{
			// Create a new object for not-existing path nodes
			if (typeof _target[path[i]] === 'undefined')
			{
				_target[path[i]] = {};
			}

			// Check whether the path node is really an object
			if (typeof _target[path[i]] === 'object')
			{
				_target = _target[path[i]];
			}
			else
			{
				egw.debug("error", "ID collision while writing at path " + 
					"node '" + path[i] + "'");
			}
		}

		// Handle arrays, eg radio[]
		if(id === "")
		{
			id = typeof target == "undefined" ? 0 : _target.length;
		}

		// Check whether the entry is really undefined
		if (typeof _target[id] != "undefined")
		{
			egw.debug("error", _widget, "Overwriting value of '" + _widget.id + 
				"', id exists twice!");
		}

		// Store the value of the widget and reset its dirty flag
		var value = _widget.getValue();
		if (value !== null)
		{
			_target[id] = value;
		}
		else if (jQuery.isEmptyObject(_target))
		{
			// Avoid sending back empty sub-arrays
			_target = result
			for (var i = 0; i < path.length-1; i++)
			{
				_target = _target[path[i]];
			}
			delete _target[path[path.length-1]];
		}
		_widget.resetDirty();

	}, this, et2_IInput);

	egw().debug("info", "Value", result);
	return result;
}

function etemplate2_handle_load(_type, _response)
{
	// Check the parameters
	var data = _response.data;
	if (typeof data.url == "string" && typeof data.data === 'object')
	{
		this.load(data.name, data.url, data.data);
		return true;
	}

	throw("Error while parsing et2_load response");
}

function etemplate2_handle_validation_error(_type, _response)
{
	// Display validation errors
	//$j(':input',this.DOMContainer).data("validator").invalidate(_response.data);
}

// Calls etemplate2_handle_response in the context of the object which
// requested the response from the server
egw(window).registerJSONPlugin(etemplate2_handle_load, null, 'et2_load');
egw(window).registerJSONPlugin(etemplate2_handle_validation_error, null, 'et2_validation_error');

