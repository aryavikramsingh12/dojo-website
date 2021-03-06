<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Demo: Dijit Menus</title>
	<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	<?php
		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
		Utils::printClaroCss();
	?>
</head>
<body class="claro">
	<h3>MenuBar Demo</h3>
	<div id="mainMenu" data-dojo-type="dijit/MenuBar">
		<div id="edit" data-dojo-type="dijit/MenuBarItem">Edit</div>
		<div id="view" data-dojo-type="dijit/MenuBarItem">View</div>
		<div id="task" data-dojo-type="dijit/PopupMenuBarItem">
			<span>Task</span>
			<div id="taskMenu" data-dojo-type="dijit/Menu">
				<div id="complete" data-dojo-type="dijit/MenuItem">Mark as Complete</div>
				<div id="cancel" data-dojo-type="dijit/MenuItem">Cancel</div>
				<div id="begin" data-dojo-type="dijit/MenuItem">Begin</div>
			</div>
		</div><!-- end of sub-menu -->
	</div>
	<p>Last selected: <span id="lastSelected">none</span></p>

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
		Utils::printDojoScript("isDebug:1, async:1");
	?>
	<script>
        require([
            "dojo/dom",
            "dojo/parser",
            "dijit/registry",
            "dijit/WidgetSet", // for registry.byClass
            "dijit/Menu",
            "dijit/MenuItem", 
            "dijit/MenuBar",
            "dijit/MenuBarItem", 
            "dijit/PopupMenuBarItem",
            "dojo/domReady!"
        ], function(dom, parser, registry){
			// a menu item selection handler
			var onItemSelect = function(event){
				dom.byId("lastSelected").innerHTML = this.get("label");
			};

			parser.parse();

			var setClickHandler = function(item){
				item.on("click", onItemSelect);
			};

			registry.byClass("dijit.MenuItem").forEach(setClickHandler);
			registry.byClass("dijit.MenuBarItem").forEach(setClickHandler);
		});
	</script>
</body>
</html>
