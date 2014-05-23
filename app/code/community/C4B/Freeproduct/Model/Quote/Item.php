<?php
/**
 * Sales Quote Item Model
 *
 * @category     C4B
 * @package      C4B_Freeproduct
 * @author       Benedikt Blank <benedikt.blank@aijko.com>
 * @version      0.1.0
 */
class C4B_Freeproduct_Model_Quote_Item extends Mage_Sales_Model_Quote_Item
{
    /**
     * Additional representation check on the "product in item" in case of free products
     *
     * @param   Mage_Catalog_Model_Product $product
     * @return  bool
     */
    public function representProduct($product)
    {
        // Call parent because we don't want to mess with core logic
        $represent = parent::representProduct($product);

        // If the product/item seems to be a free product, it's always "false", meaning don't merge free items with non-free items
        if ($this->getIsFreeProduct() == 1) {
            $represent = false;
        }

        return $represent;
    }
}
