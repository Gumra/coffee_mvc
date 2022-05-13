<?php $currentUser=array_key_first($_SESSION);?>
<div class="container-fluid">
    <img src="/application/public/materials/profilesImage/<?=$_SESSION[$currentUser][0]['id'].'.jpg'?>" width="50" height="50">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Мобильный</th>
                <th scope="col">Почта</th>
                <th scope="col">День рождения</th>
                <th scope="col">Адрес</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$_SESSION[$currentUser][0]['firstName']?></td>
                <td><?=$_SESSION[$currentUser][0]['lastName']?></td>
                <td><?=$_SESSION[$currentUser][0]['phone']?></td>
                <td><?=$_SESSION[$currentUser][0]['email']?></td>
                <td><?=$_SESSION[$currentUser][0]['birthday']?></td>
                <td><?=$_SESSION[$currentUser][0]['address']?></td>
            </tr>
        </tbody>
    </table>
</div>