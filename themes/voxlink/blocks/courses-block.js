/* This section of the code registers a new block, sets an icon and a category, and indicates what type of fields it'll include. */
var wp = require('wp');
var React = require('React');
wp.blocks.registerBlockType('courses-block', {
  title: 'Курсы',
  category: 'common',
  attributes: {
    content: {type: 'string'},
    color: {type: 'string'}
  },

/* This configures how the content and color fields will work, and sets up the necessary elements */

  edit: function(props) {
    function updateContent(event) {
      // props.setAttributes({content: event.target.value})
    }
    function updateColor(value) {
      // props.setAttributes({color: value.hex})
    }
    return React.createElement(
      "div",
      null,
      React.createElement(
        "h3",
        null,
        "Курсы"
      )
      ,
      React.createElement("input", { type: "text", value: props.attributes.content, onChange: updateContent }),
      React.createElement(wp.components.ColorPicker, { color: props.attributes.color, onChangeComplete: updateColor })
    );
  },
  save: function(props) {
    return (
        React.createElement("div", {class: "courses-block"}, 
          React.createElement("div", {class: "cb-item"}
          ), 
          React.createElement("div", {class: "cb-item"}, 
            React.createElement("h2", null, "Расписание курсов по Mikrotik"), 
            React.createElement("div", {class: "cb-course-item"}

            )
          )
        )
    );
  }
});