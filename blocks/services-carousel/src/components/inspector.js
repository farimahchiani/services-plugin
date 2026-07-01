import { __ } from '@wordpress/i18n';

import {
    InspectorControls
} from '@wordpress/block-editor';

import {
    PanelBody,
    RangeControl
} from '@wordpress/components';

export default function Inspector({
    attributes,
    setAttributes
}) {

    return (

        <InspectorControls>

            <PanelBody
                title={__('Carousel Settings', 'services-plugin')}
                initialOpen={true}
            >

                <RangeControl
                    label={__('Number of services', 'services-plugin')}
                    value={attributes.postsToShow}
                    min={1}
                    max={20}
                    onChange={(value) =>
                        setAttributes({
                            postsToShow: value
                        })
                    }
                />

            </PanelBody>

        </InspectorControls>

    );

}