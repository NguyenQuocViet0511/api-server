    <div class="form_create">
        <form class="container" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Tên Sản Phẩm</label>
                <input class="input is-primary"  name='name' type="text" placeholder="Nhập Tên Sản Phẩm" required>
                <label class="label mt-3">Giá </label>
                <input type = number class="input is-primary"  name='status' type="text" placeholder="Nhập Giá " required>
            </div>
            <label class="label">Danh Mục</label>
            <div class="select is-primary">
                <select name="id_category">

                </select>
            </div>
            <div class="mt-5">
                <button class="button is-info">Thêm Sản Phẩm</button>
            </div>
