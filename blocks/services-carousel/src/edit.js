import Inspector from './components/inspector';

import { __ } from '@wordpress/i18n';

export default function Edit() {

    return (
        <>
            <Inspector />

            <p>
                {__('Services Carousel Block', 'services-plugin')}
            </p>
        </>
    );

}