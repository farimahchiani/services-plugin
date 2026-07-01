
(function (blocks, element, blockEditor, components) {

    var el = element.createElement;

    var InspectorControls = blockEditor.InspectorControls;

    var PanelBody = components.PanelBody;

    var RangeControl = components.RangeControl;

    var SelectControl = components.SelectControl;

    blocks.registerBlockType('services/carousel', {

        edit: function (props) {

            return [

                el(
                    InspectorControls,
                    {},

                    el(
                        PanelBody,
                        {
                            title: 'Query Settings',
                            initialOpen: true
                        },

                        el(RangeControl, {

                            label: 'Number of Services',

                            value: props.attributes.number,

                            min: 1,

                            max: 20,

                            onChange: function (value) {

                                props.setAttributes({

                                    number: value

                                });

                            }

                        }),

                        el(SelectControl, {

                            label: 'Display Order',

                            value: props.attributes.order,

                            options: [

                                {

                                    label: 'Newest',

                                    value: 'DESC'

                                },

                                {

                                    label: 'Oldest',

                                    value: 'ASC'

                                }

                            ],

                            onChange: function (value) {

                                props.setAttributes({

                                    order: value

                                });

                            }

                        })

                    )

                ),

                el(

                    'p',

                    {},

                    'Services Carousel'

                )

            ];

        },

        save: function () {

            return null;

        }

    });

})(

    window.wp.blocks,

    window.wp.element,

    window.wp.blockEditor,

    window.wp.components

);