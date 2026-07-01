import { __ } from '@wordpress/i18n';

import { InspectorControls } from '@wordpress/block-editor';

import {
    PanelBody,
    RangeControl,
    SelectControl,
} from '@wordpress/components';

export default function Inspector({
    attributes,
    setAttributes,
}) {

    return (

        <InspectorControls>

            <PanelBody
                title={__('Carousel Settings', 'services-plugin')}
                initialOpen={true}
            >

                <RangeControl
                    label={__('Number of services', 'services-plugin')}
                    value={attributes.number}
                    min={1}
                    max={20}
                    onChange={(value) =>
                        setAttributes({
                            number: value,
                        })
                    }
                />

                <SelectControl
                    label={__('Order', 'services-plugin')}
                    value={attributes.order}
                    options={[
                        {
                            label: __('Newest First', 'services-plugin'),
                            value: 'DESC',
                        },
                        {
                            label: __('Oldest First', 'services-plugin'),
                            value: 'ASC',
                        },
                    ]}
                    onChange={(value) =>
                        setAttributes({
                            order: value,
                        })
                    }
                />

                <SelectControl
                    label={__('Order By', 'services-plugin')}
                    value={attributes.orderby}
                    options={[
                        {
                            label: __('Publish Date', 'services-plugin'),
                            value: 'date',
                        },
                        {
                            label: __('Title', 'services-plugin'),
                            value: 'title',
                        },
                    ]}
                    onChange={(value) =>
                        setAttributes({
                            orderby: value,
                        })
                    }
                />

            </PanelBody>

        </InspectorControls>

    );

}