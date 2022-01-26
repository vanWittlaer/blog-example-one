import { DiscountTypes, DiscountScopes } from '../../../../../../../../../../../../vendor/shopware/administration/Resources/app/administration/src/module/sw-promotion/helper/promotion.helper';
import template from './sw-promotion-detail-discounts.html.twig';

const utils = Shopware.Utils;

Shopware.Component.override('sw-promotion-detail-discounts', {
    template,

    methods: {
        onAddDiscount() {
            const promotionDiscountRepository = this.repositoryFactory.create(
                this.discounts.entity,
                this.discounts.source
            );
            const newDiscount = promotionDiscountRepository.create(Shopware.Context.api);
            newDiscount.id = utils.createId();
            newDiscount.promotionId = this.promotion.id;
            newDiscount.scope = DiscountScopes.CART;
            newDiscount.type = DiscountTypes.PERCENTAGE;
            newDiscount.value = 0.01;
            newDiscount.considerAdvancedRules = false;
            newDiscount.sorterKey = 'PRICE_ASC';
            newDiscount.applierKey = 'ALL';
            newDiscount.usageKey = 'ALL';

            const promotionDiscountAddonsRepository =
                this.repositoryFactory.create('vanwittlaer_promotion_discount_addons');
            const newAddons = promotionDiscountAddonsRepository.create(Shopware.Context.api);
            newAddons.promotionDiscountId = newDiscount.id;
            newAddons.promotionDiscountKey = '';
            newDiscount.extensions.addons = newAddons;

            this.discounts.push(newDiscount);
        }
    }
});
