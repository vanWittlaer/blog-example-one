import template from './sw-promotion-discount-component.html.twig';
import deDE from "../../../../snippet/de-DE.json";

Shopware.Component.override('sw-promotion-discount-component', {
    template: template,

    snippet: {
        'de-DE': deDE
    }
});
