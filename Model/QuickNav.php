<?php

namespace Aaron\QuickMenu\Model;

class QuickNav
{
    public function aroundGetUrl(
        $subject,
        \Closure $proceed
    )
    {
        $products = $subject->getProductCollection();
        if (count($products) === 1) {
            $url = null;
            foreach ($products as $product) {
                $url = $product->getProductUrl();
            }
            if (!is_null($url))
                return $url;
        }
        $result = $proceed();
        return $result;
    }
}