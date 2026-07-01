import { __ } from '@wordpress/i18n';
import { InspectorControls } from '@wordpress/block-editor';
import {
    PanelBody,
    RangeControl,
    SelectControl,
} from '@wordpress/components';

import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

export default function Inspector({
    attributes,
    setAttributes,
}) {

    const [categories, setCategories] = useState([]);

    useEffect(() => {

        apiFetch({ path: '/wp/v2/service_category?per_page=100' })
            .then((data) => {

                const options = data.map((cat) => ({
                    label: cat.name,
                    value: cat.slug,
                }));

                setCategories(options);

            });

    }, []);

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
                        setAttributes({ number: value })
                    }
                />

                <SelectControl
                    label={__('Order', 'services-plugin')}
                    value={attributes.order}
                    options={[
                        { label: __('Newest First', 'services-plugin'), value: 'DESC' },
                        { label: __('Oldest First', 'services-plugin'), value: 'ASC' },
                    ]}
                    onChange={(value) =>
                        setAttributes({ order: value })
                    }
                />

                <SelectControl
                    label={__('Order By', 'services-plugin')}
                    value={attributes.orderby}
                    options={[
                        { label: __('Publish Date', 'services-plugin'), value: 'date' },
                        { label: __('Title', 'services-plugin'), value: 'title' },
                    ]}
                    onChange={(value) =>
                        setAttributes({ orderby: value })
                    }
                />

                <SelectControl
                    label={__('Service Category', 'services-plugin')}
                    value={attributes.category}
                    options={[
                        { label: __('All', 'services-plugin'), value: '' },
                        ...categories,
                    ]}
                    onChange={(value) =>
                        setAttributes({ category: value })
                    }
                />

                <RangeControl
                    label={__('Min Price', 'services-plugin')}
                    value={attributes.minPrice}
                    min={0}
                    max={100000000}
                    onChange={(value) =>
                        setAttributes({ minPrice: value })
                    }
                />

                <RangeControl
                    label={__('Max Price', 'services-plugin')}
                    value={attributes.maxPrice}
                    min={0}
                    max={100000000}
                    onChange={(value) =>
                        setAttributes({ maxPrice: value })
                    }
                />

            </PanelBody>

        </InspectorControls>
    );
}