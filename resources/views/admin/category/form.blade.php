<div class="row">

    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <label for="name">عنوان دسته بندی  :</label>
                <input class="form-control" name="name" id="name"
                       value="{{ old('name',isset($catItem) ? $catItem->name: '')  }}">
            </div>

            <div class="form-group mt-3">
                <label for="parent_category">دسته بندی والد : </label>
                <select name="parent_category" class="select2 form-control" id="parent_category">
                    <option></option>
                    @foreach($categories as $cat)
                        <option value="{{  $cat->id }}" {{ isset($parent_category) && $cat->id == $parent_category ? 'selected' : ''  }}>{{ $cat->name  }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>