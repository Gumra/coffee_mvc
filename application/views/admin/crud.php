<div class="container-fluid">
    <form action="/<?=$url?>" method="post" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-md-3">
                <input name="categories" list="categories" placeholder="Выберите категорию" value="<?php if (isset($category)) {echo $category;}?>"/>
                <datalist id="categories">
                    <option value="Напитки"></option>
                    <option value="Десерты"></option>
                    <option value="На заказ"></option>
                </datalist>
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="inputName" class="form-label">Название</label>
                <input name="name" type="text" class="form-control" id="inputName" value="<?php if (isset($data)) {echo $data[0]['name'];}?>">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="inputDescription" class="form-label">Описание</label>
                <textarea name="description" id="inputDescription" class="form-control"  cols="10" rows="10"><?php if (isset($data)) {echo trim($data[0]['description'],' ');}?></textarea>
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Цена</label>
                <input name="price" type="number" id="inputPrice" class="form-control" min="1" value="<?php if (isset($data)) {echo intval($data[0]['price']);}?>">
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" name="img" type="file" id="formFile" accept="image/*">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>