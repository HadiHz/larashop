<div class="row">
    @include('admin.partials.errors')
    <div class="col-xs-12 col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field()  }}
            <div class="form-group">
                <label for="name">نام محصول :</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',isset($productItem) ? $productItem->name: '')  }}" >
            </div>
            <div class="form-group">
                <label for="price">قیمت محصول :</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ old('price',isset($productItem) ? $productItem->price: '')  }}" >
            </div>
            <div class="form-group">
                <label for="quantity_in_warehouse">تعداد در انبار :</label>
                <input type="text" class="form-control" name="quantity_in_warehouse" id="quantity_in_warehouse" value="{{ old('quantity_in_warehouse',isset($productItem) ? $productItem->quantity_in_warehouse: '')  }}" >
            </div>
            <div class="form-group">
                <label for="description">توضیحات محصول  :</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description',isset($productItem) ? $productItem->description: '')  }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="categories">دسته بندی ها </label>
                <select name="categories[]" class="select2 form-control" id="categories" multiple>
                    @foreach($categories as $cat)
                        <option value="{{  $cat->id }}" {{ isset($product_categories) && in_array($cat->id,$product_categories) ? 'selected' : ''  }}>{{ $cat->name  }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image_path"  >تصویر محصول :</label>
                <input type="file"  name="image_path" id="image_path">
            </div>
            <div class="form-group">
                <button  class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>