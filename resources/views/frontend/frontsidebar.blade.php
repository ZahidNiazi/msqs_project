<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="sidebar bg-light shadow-sm rounded p-3">
    <div class="mcqs-details">
        <h6 class="fw-bold text-primary mb-2">
            <i class="fa-solid fa-list"></i> LATEST MENU
        </h6>
        <hr class="mt-1 mb-2">
        <ul class="list-group" id="category-list">
            @foreach ($categories as $category)
                <li class="list-group-item border-0 px-0">
                    <a class="category-select d-flex align-items-center justify-content-between text-dark py-2 px-2 rounded hover-bg"
                       data-id="{{ $category->id }}" href="#">
                        <span><i class="fa-solid fa-folder-open me-2 text-warning"></i>{{ $category->name }}</span>
                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="list-group subcategory-list ps-3" id="sub-{{ $category->id }}" style="display:none;"></ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
    .hover-bg:hover {
        background-color: #f1f7ff;
        transition: 0.2s ease-in-out;
    }
    .dropdown-arrow {
        transition: transform 0.3s ease;
    }
    .dropdown-arrow.rotated {
        transform: rotate(-180deg);
    }
    .list-group-item {
        background: transparent;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(document).off('click', '.category-select');
    $(document).off('click', '.subcategory-select');

    // Category click with auto close for others
    $(document).on('click', '.category-select', function (e) {
        e.preventDefault();
        var categoryId = $(this).data('id');
        var subList = $('#sub-' + categoryId);
        var arrow = $(this).find('.dropdown-arrow');

        // Close all other dropdowns
        $('.subcategory-list').not(subList).slideUp(150);
        $('.dropdown-arrow').not(arrow).removeClass('rotated');

        if (subList.children().length > 0) {
            subList.slideToggle(150);
            arrow.toggleClass('rotated');
            return;
        }

        $.ajax({
            url: '/get-subcategories/' + categoryId,
            method: 'GET',
            success: function (subcategories) {
                subList.empty();
                if (subcategories.length > 0) {
                    subcategories.forEach(function (subcat) {
                        subList.append(`
                            <li class="list-group-item border-0 px-0">
                                <a class="subcategory-select d-flex justify-content-between align-items-center py-2 px-2 rounded hover-bg" data-id="${subcat.id}" href="#">
                                    <span><i class="fa-solid fa-folder me-2 text-secondary"></i>${subcat.name}</span>
                                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                                </a>
                                <ul class="list-group topic-list ps-4" id="topic-${subcat.id}" style="display:none;"></ul>
                            </li>
                        `);
                    });
                } else {
                    subList.append('<li class="list-group-item border-0 ps-4 text-muted">No subcategories</li>');
                }
                subList.slideDown(150);
                arrow.addClass('rotated');
            }
        });
    });

    // Subcategory click with auto close for others
    $(document).on('click', '.subcategory-select', function (e) {
        e.preventDefault();
        var subcatId = $(this).data('id');
        var topicList = $('#topic-' + subcatId);
        var arrow = $(this).find('.dropdown-arrow');

        $('.topic-list').not(topicList).slideUp(150);
        $('.subcategory-select .dropdown-arrow').not(arrow).removeClass('rotated');

        if (topicList.children().length > 0) {
            topicList.slideToggle(150);
            arrow.toggleClass('rotated');
            return;
        }

        $.ajax({
            url: '/get-topics/' + subcatId,
            method: 'GET',
            success: function (topics) {
                topicList.empty();
                if (topics.length > 0) {
                    topics.forEach(function (topic) {
                        topicList.append(`
                            <li class="list-group-item border-0 px-0 ps-4">
                                <a href="/all-mcqs/${topic.id}" class="py-1 d-block">
                                    <i class="fa-solid fa-circle-question text-success me-2"></i>${topic.name}
                                </a>
                            </li>
                        `);
                    });
                } else {
                    topicList.append(`
                        <li class="list-group-item border-0 ps-4">
                            <a href="/all-mcqs/${subcatId}" class="text-primary">
                                <i class="fa-solid fa-chevron-down up-arrow me-2"></i> View MCQs
                            </a>
                        </li>
                    `);
                }
                topicList.slideDown(150);
                arrow.addClass('rotated');
            }
        });
    });
});
</script>
