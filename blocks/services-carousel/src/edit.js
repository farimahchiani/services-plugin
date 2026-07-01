import { __ } from '@wordpress/i18n';

import Inspector from './components/inspector';

export default function Edit({
    attributes,
    setAttributes,
}) {

    return (

        <>

            <Inspector
                attributes={attributes}
                setAttributes={setAttributes}
            />

            <div className="wp-block-services-carousel">

                <p>
                    {__('Services Carousel Preview', 'services-plugin')}
                </p>

                <p>
                    {__('Number of services:', 'services-plugin')}{' '}
                    <strong>{attributes.number}</strong>
                </p>

                <p>
                    {__('Order:', 'services-plugin')}{' '}
                    <strong>{attributes.order}</strong>
                </p>

                <p>
                    {__('Order By:', 'services-plugin')}{' '}
                    <strong>{attributes.orderby}</strong>
                </p>

                <p>
                    {__('Current settings:', 'services-plugin')}
                </p>

                <ul>
                    <li>
                        {__('Services:', 'services-plugin')} {attributes.number}
                    </li>

                    <li>
                        {__('Order:', 'services-plugin')} {attributes.order}
                    </li>

                    <li>
                        {__('Order By:', 'services-plugin')} {attributes.orderby}
                    </li>
                </ul>

            </div>

        </>

    );

}