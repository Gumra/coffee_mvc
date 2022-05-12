<div class="container-fluid">
    <div class="d-flex flex-column">
     <div class="col">
        <div class="card-header"><h3 class="text-left font-weight-light my-2">Наши отзывы</h3></div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Номер</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Отзыв</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $val):?>
                    <tr>
                        <th scope="row"><?=$val['id']?></th>
                        <td><?=$val['date']?></td>
                        <td><?=$val['firstName']?></td>
                        <td><?=$val['text']?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <form action="/review" method="post">
        <div class="col">
            <div class="card-header"><h3 class="text-left font-weight-light my-2">Оставить отзыв</h3></div>
            <textarea name="text" class="form-control"  rows="3" placeholder="Введите отзыв"></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
</div>