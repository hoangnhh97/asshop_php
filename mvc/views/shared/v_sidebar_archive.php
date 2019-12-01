<div class="widget widget-product-categories">
    <div class="widget-title">
        <h3>Danh mục sản phẩm</h3>
    </div>
    <div class="widget-content">
        <ul>
            <?php 
                $row = $data["category"];
                foreach($row as $item) {
                    $permalink = Common::template_directory()."/DanhMuc/Index/".Common::generateSlug($item["cate_name"])."/".$item["category_id"]."";
            ?>
                <li><a href="<?php echo $permalink; ?>"><?php echo $item["cate_name"]; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="widget widget-product-categories">
    <div class="widget-title">
        <h3>Lọc theo giá</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo Comm::template_directory(); ?>/Filter/Index" method="get">
            <div class="form-group">
                <label for="txtPriceFrom">Từ:</label>
                <input type="number" class="form-control" id="txtPriceFrom" name="txtPriceFrom" value="0" min="0" class="form-control" />
                
            </div>
            <div class="form-group">
                <label for="txtPriceTo">Đến:</label>
                <input type="number" class="form-control" name="txtPriceTo" id="txtPriceTo" value="0" min="100000" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </form>
    </div>
</div>

<div class="widget widget-product-tags">
    <div class="widget-title">
        <h3>Thẻ</h3>
    </div>
    <div class="widget-content">
        <ul>
            <?php 
                $row = $data["tags"];
                foreach($row as $item) {
                    $permalink = Common::template_directory()."/Tag/Index/".Common::generateSlug($item["tag_name"])."/".$item["tag_id"]."";
            ?>
                <li><a href="<?php echo $permalink; ?>"><?php echo $item["tag_name"]; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>