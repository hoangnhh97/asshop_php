<?php 
    class SearchController extends Controller {

        public function Index($keyword, $cate) {
            
            $modelProduct = $this->model("Products");
            $modelFilter = $this->model("Filters");
            $modelCategory = $this->model("Category");
            $modelTag = $this->model("Tags");
            $this->view("v_search", [
                "s_keyword"=>$keyword,
                "searchProduct"=>$modelFilter->search_Product_by_Cate($keyword, $cate),
                "category"=>$modelCategory->get_All_Category(),
                "tags"=>$modelTag->get_All_Tags(),
            ]);
        }
    }
?>