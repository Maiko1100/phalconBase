<?php
namespace Backend\Api\Controllers;


use Backend\Source\Components\ResponseUtils;
use Backend\Source\Models\Category;

class CategoryController extends ControllerBase
{
    /**
     * Index action
     *
     * Get all categories
     */
    public function indexAction()
    {

//        $discounts = Category::find();
        ResponseUtils::sendResponse(ResponseUtils::STATUS_OK, 'test');
    }

    /**
     * Get category by ID.
     *
     * @param int|null $id ID of the category
     *
     * @return void
     */
    public function idAction($id = null)
    {
        if (is_null($id)) {
            ResponseUtils::sendResponse(ResponseUtils::STATUS_BAD_REQUEST);
        }

        $category = Category::findFirstByCategoryId($id);

        if (empty($category)) {
            ResponseUtils::sendResponse(ResponseUtils::STATUS_NOT_FOUND);
        }

        ResponseUtils::sendResponse(ResponseUtils::STATUS_OK, $category);
    }

}
