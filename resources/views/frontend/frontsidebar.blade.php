{{-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3" style="border-left: 1px solid #e9e9e9;"> --}}
<div class="" style="border-left: 1px solid #e9e9e9;">
    <div class="sidebar">
        <div class="mcqs-details mt-0">
            <h6>LATEST MENU</h6>
            <hr class="mt-0">
            <ul class="list-group" id="category-list">
                @foreach ($categories as $category)
                    <li class="list-group-item p-1 border-0 position-relative">
                        <a class="category-select d-flex align-items-center justify-content-between" data-id="{{ $category->id }}" href="#" style="font-weight:bold;">
                            <span>{{ $category->name }}</span>
                            <span class="dropdown-arrow">&#9662;</span>
                        </a>
                        <ul class="list-group subcategory-list mt-1 ps-2" id="sub-{{ $category->id }}" style="display:none;"></ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Dropdown JS -->
<script>
    $(document).ready(function () {
        $(document).off('click', '.category-select');

        $(document).on('click', '.category-select', function (e) {
            e.preventDefault();

            var categoryId = $(this).data('id');
            var subList = $('#sub-' + categoryId);
            var arrow = $(this).find('.dropdown-arrow');

            if (subList.children().length > 0) {
                subList.slideToggle(150);
                arrow.toggleClass('rotated');
                return;
            }

            $.ajax({
                url: '/get-subcategories/' + categoryId,
                method: 'GET',
                success: function (data) {
                    subList.empty();

                    if (data.length > 0) {
                        data.forEach(function (subcat) {
                            subList.append(
                                '<li class="list-group-item p-1 border-0 ps-4"><a href="/all-mcqs/' + subcat.id + '">' + subcat.name + '</a></li>'
                            );
                        });
                    } else {
                        subList.append('<li class="list-group-item p-1 border-0 ps-4 text-muted">No subcategories</li>');
                    }

                    subList.slideDown(150);
                    arrow.addClass('rotated');
                },
                error: function () {
                    alert('Could not load subcategories.');
                }
            });
        });
    });
</script>

<!-- Dropdown CSS -->
<style>
    .dropdown-arrow {
        display: inline-block;
        margin-left: 8px;
        font-size: 1.1em;
        transition: transform 0.2s;
    }

    .dropdown-arrow.rotated {
        transform: rotate(-180deg);
    }

    .list-group-item > a {
        font-weight: bold;
        display: block;
        cursor: pointer;
    }
</style>
