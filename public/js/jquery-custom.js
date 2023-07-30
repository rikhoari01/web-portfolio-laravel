function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if ($(input).attr("id") == "photo") {
                $("#home-img").attr("src", e.target.result);
            }
            if ($(input).attr("id") == "about_img") {
                $(".prev-about-img").attr("src", e.target.result);
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#photo").change(function () {
    readURL(this);
});

$("#about_img").change(function () {
    readURL(this);
});

$("#add-skills").click(function (e) {
    e.preventDefault();

    $(".modal-form").attr("action", "/skills/add");

    $(".modal-title").text("Add Skills");

    $(".label-1").text("Skill Name");
    $(".label-1").attr("for", "skill_name");
    $(".input-1").attr("name", "skill_name");
    $(".input-1").attr("id", "skill_name");
    $(".input-1").attr("placeholder", "Your Skill");

    $(".label-2").text("Level");
    $(".label-2").attr("for", "skill_level");
    $(".input-2").attr("name", "skill_level");
    $(".input-2").attr("id", "skill_level");
    $(".input-2").attr("placeholder", "Your Skill Level");

    $(".label-3").text("Category");
    $(".label-3").attr("for", "skill_category");
    $(".input-3").attr("name", "skill_category");
    $(".input-3").attr("id", "skill_category");
    $(".input-3").attr("placeholder", "Your Skill Category");

    $(".group-4").addClass("d-none");
    $(".group-5").addClass("d-none");
    $(".group-6").addClass("d-none");

    $(".modal").addClass("active-modal");
});

$(".edit-skills").click(function (e) {
    e.preventDefault();

    const id = $(this).data("id");
    $('#id').val(id);

    $(".modal-form").attr("action", "/skills/edit");

    $(".modal-title").text("Edit Skills");

    $(".label-1").text("Skill Name");
    $(".label-1").attr("for", "skill_name");
    $(".input-1").attr("name", "skill_name");
    $(".input-1").attr("id", "skill_name");
    $(".input-1").attr("placeholder", "Your Skill");

    $(".label-2").text("Level");
    $(".label-2").attr("for", "skill_level");
    $(".input-2").attr("name", "skill_level");
    $(".input-2").attr("id", "skill_level");
    $(".input-2").attr("placeholder", "Your Skill Level");

    $(".label-3").text("Category");
    $(".label-3").attr("for", "skill_category");
    $(".input-3").attr("name", "skill_category");
    $(".input-3").attr("id", "skill_category");
    $(".input-3").attr("placeholder", "Your Skill Category");

    $(".group-4").addClass("d-none");
    $(".group-5").addClass("d-none");
    $(".group-6").addClass("d-none");

    $.get("/skills/" + id, function (data) {
        $(".input-1").val(data.data.skill_name);
        $(".input-2").val(data.data.skill_level);
        $(".input-3").val(data.data.skill_category);

        $(".modal").addClass("active-modal");
    });
});

$(".delete-skills").click(function () {
    const id = $(this).data("id");
    $('#del_id').val(id);

    $(".delete-form").attr("action", "/skills/delete");

    $("#deleteModal").addClass("active-modal");
})

$("#add-works").click(function (e) {
    e.preventDefault();

    $(".group-4").removeClass("d-none");
    $(".group-5").removeClass("d-none");
    $(".group-6").removeClass("d-none");

    $(".modal-form").attr("action", "/works/add");

    $(".modal-title").text("Add Works");

    $(".label-1").text("Title");
    $(".label-1").attr("for", "work_title");
    $(".input-1").attr("name", "work_title");
    $(".input-1").attr("id", "work_title");
    $(".input-1").attr("placeholder", "Your Work");

    $(".label-2").text("Technology");
    $(".label-2").attr("for", "work_tech");
    $(".input-2").attr("name", "work_tech");
    $(".input-2").attr("id", "work_tech");
    $(".input-2").attr("placeholder", "Your Work Technology");

    $(".label-3").text("Description");
    $(".label-3").attr("for", "work_desc");
    $(".input-3").attr("name", "work_desc");
    $(".input-3").attr("id", "work_desc");
    $(".input-3").attr("placeholder", "Your Work Description");

    $("#modalBtn").prop('disabled', false);
    $("#modalBtn").addClass("disable-btn");

    $(".modal").addClass("active-modal");
});

$(".edit-works").click(function (e) {
    e.preventDefault();

    $(".group-4").removeClass("d-none");
    $(".group-5").removeClass("d-none");
    $(".group-6").removeClass("d-none");

    const id = $(this).data("id");
    $('#id').val(id);

    $(".modal-form").attr("action", "/works/edit");

    $(".modal-title").text("Edit Works");

    $(".label-1").text("Title");
    $(".label-1").attr("for", "work_title");
    $(".input-1").attr("name", "work_title");
    $(".input-1").attr("id", "work_title");
    $(".input-1").attr("placeholder", "Your Work");

    $(".label-2").text("Technology");
    $(".label-2").attr("for", "work_tech");
    $(".input-2").attr("name", "work_tech");
    $(".input-2").attr("id", "work_tech");
    $(".input-2").attr("placeholder", "Your Work Technology");

    $(".label-3").text("Description");
    $(".label-3").attr("for", "work_desc");
    $(".input-3").attr("name", "work_desc");
    $(".input-3").attr("id", "work_desc");
    $(".input-3").attr("placeholder", "Your Work Description");

    $("#modalBtn").prop('disabled', false);
    $("#modalBtn").addClass("disable-btn");

    $.get("/works/" + id, function (data) {
        $(".input-1").val(data.data.work_title);
        $(".input-2").val(data.data.work_tech);
        $(".input-3").val(data.data.work_desc);
        $(".input-4").val(data.data.work_link);
        if(data.data.work_category == "web"){
            $(".input-5").val("web");
        }
        else if(data.data.work_category == "app"){
            $(".input-5").val("app");
        }
        else{
            $(".input-5").val("other");
        }
        $("#old_work_img").val(data.data.work_img);

        $(".modal").addClass("active-modal");
    });
});

$(".delete-work").click(function () {
    const id = $(this).data("id");
    $('#del_id').val(id);

    $(".delete-form").attr("action", "/works/delete");

    $("#deleteModal").addClass("active-modal");
})

$(".no-button").click(function () {
    $("#deleteModal").removeClass("active-modal");
})

$(".works-button").click(function (e) {
    e.preventDefault();

    const id = $(this).data("id");

    $.get("/works/" + id, function (data) {
        $(".modal-title").text(data.data.work_title);
        $(".preview-img").attr("src", data.data.work_img);
        $(".preview-img").attr("alt", data.data.work_title);
        $(".work-desc").text(data.data.work_desc);
        $(".work-tech").text(data.data.work_tech);
        $(".work-category").text(data.data.work_category);
        $(".demo-button").attr("href", data.data.work_link);

        $(".modal").addClass("active-modal");
    });
})
