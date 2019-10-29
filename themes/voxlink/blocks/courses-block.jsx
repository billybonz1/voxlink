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
        <div class="courses-block">
          <div class="cb-item">
          </div>
          <div class="cb-item">
            <h2>Расписание курсов по Mikrotik</h2>
            <div class="cb-course-item">

            </div>
          </div>
        </div>
    );
  }
});