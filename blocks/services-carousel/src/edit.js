import { __ } from '@wordpress/i18n';

import Inspector from './components/inspector';

export default function Edit({
    attributes,
    setAttributes
}) {

    return (

        <>

            <Inspector
                attributes={attributes}
                setAttributes={setAttributes}
            />

            <div className="wp-block-services-carousel">

                <p>

                    {__(
                        'Services Carousel Preview',
                        'services-plugin'
                    )}

                </p>

                <p>

                    {__(
                        'Number of services:',
                        'services-plugin'
                    )}

                    {' '}

                    <strong>

                        {attributes.postsToShow}

                    </strong>

                </p>

            </div>

        </>

    );

}