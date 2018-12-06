<div class="row">

    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <label for="name">نام روش :</label>
                <input class="form-control" name="name" id="name"
                       value="{{ old('name',isset($shippingItem) ? $shippingItem->name: '')  }}">
            </div>

            <div class="form-group">
                <label for="cost">هزینه روش :</label>
                <input class="form-control" name="cost" id="cost"
                       value="{{ old('cost',isset($shippingItem) ? $shippingItem->cost: '')  }}">
            </div>

            <div class="form-group">
                <label for="description">توضیحات :</label>
                <textarea class="form-control" name="description"
                          id="description">{{ old('description',isset($shippingItem) ? $shippingItem->description: '')  }}</textarea>
            </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>