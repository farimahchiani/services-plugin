const { registerBlockType } = wp.blocks;

registerBlockType('services/carousel', {
    title: 'Services Carousel',
    icon: 'images-alt2',
    category: 'widgets',

    edit() {
        return wp.element.createElement(
            'p',
            null,
            'Services Carousel Block'
        );
    },

    save() {
        return null;
    }
});