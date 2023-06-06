var index = 0;
var optionindex = 0;

function updateLabel(id, label, type, insertion = "insert") {
    if (insertion === "update") {
        $(`input[name='data[${id}][fieldlabel]`).val(label);
        return;
    }
    $(".submitform").append(`
        <div class="${id}-wraper">
            <input type="text" class="form-control" name="data[${id}][fieldlabel]" value="${label}">
            <input type="text" class="form-control" name="data[${id}][fieldtype]" value="${type}" >
        </div>
    `);

    if (type === "checkbox" || type === "radio") {
        $(".submitform").append(`
            <div class="fieldoption${optionindex}-wraper editable${index}-wraper">
                <input type="text" class="form-control" name="data[${id}][fieldoption][${optionindex}]" value="ตัวเลือก">
            </div>
        `);
    }
}

function updateOption(parentID, id, label) {
    $(`input[name='data[${parentID}][fieldoption][${id}]`).val(label);
}

async function editText(id) {
    const textElement = document.getElementById("editable" + id);
    const originalId = textElement.id;
    const originalOnclick = textElement.getAttribute("onclick");
    const originalType = textElement.getAttribute("type");

    // Create an input element
    const inputElement = document.createElement("input");
    inputElement.type = "text";
    inputElement.value = textElement.textContent;

    // Replace the text element with the input element
    textElement.parentNode.replaceChild(inputElement, textElement);

    // Focus the input element
    inputElement.focus();

    // Await input and display modified string
    const inputValue = await getInputValue(inputElement);

    if (id == "title") {
        $(`input[name='title']`).val(inputValue);
    } else {
        updateLabel(`editable${id}`, inputValue, originalType, "update");
    }
    const newText = document.createElement("h6");
    newText.innerText = inputValue;
    newText.id = originalId;
    newText.classList = textElement.classList;
    newText.onclick = function () {
        editText(id);
    };
    inputElement.parentNode.replaceChild(newText, inputElement);
}

async function editOption(id) {
    const textElement = document.getElementById("editoption" + id);
    const originalId = textElement.id;
    const originalOnclick = textElement.getAttribute("onclick");
    const originalType = textElement.getAttribute("type");
    const originalFor = textElement.getAttribute("for");
    const originalParent = textElement.getAttribute("parent");

    // Create an input element
    const inputElement = document.createElement("input");
    inputElement.type = "text";
    inputElement.value = textElement.textContent;

    // Replace the text element with the input element
    textElement.parentNode.replaceChild(inputElement, textElement);

    // Focus the input element
    inputElement.focus();

    // Await input and display modified string
    const inputValue = await getInputValue(inputElement);
    updateOption(originalParent, id, inputValue);
    const newText = document.createElement("label");
    newText.innerText = inputValue;
    newText.id = originalId;
    newText.classList = textElement.classList;
    newText.setAttribute("for", originalFor);
    newText.setAttribute("parent", originalParent);
    newText.onclick = function () {
        editOption(id);
    };
    inputElement.parentNode.replaceChild(newText, inputElement);
}

function getInputValue(inputElement) {
    return new Promise((resolve) => {
        inputElement.addEventListener("keydown", handleInputChange);

        setTimeout(() => {
            document.addEventListener("click", handleOutsideClick);
        }, 1000); // 1 second delay


        function handleInputChange(event) {
            if (event.key === "Enter") {
                cleanup();
                resolve(inputElement.value);
            }
        }

        function handleOutsideClick(event) {
            if (!inputElement.contains(event.target)) {
                cleanup();
                resolve(inputElement.value);
            }
        }

        function cleanup() {
            inputElement.removeEventListener("keydown", handleInputChange);
            document.removeEventListener("click", handleOutsideClick);
        }
    });
}

function addOption(parentID, type) {
    optionindex++;
    $(`#addoption${parentID}`)
        .parent()
        .append(
            `
        <div class="form-check fieldoption${optionindex}-wraper">
            <input class="form-check-input" type="` +
                type +
                `" value="" option-for="editable${parentID}" id="option${optionindex}" disabled>
            <label class="form-check-label" for="option${optionindex}" parent="editable${parentID}" id="editoption${optionindex}" onclick="editOption(${optionindex});">ตัวเลือก</label>
            <label class="form-check-label ms-1 cursor-pointer" for="option${optionindex}" onclick="deleteOption(${optionindex});"> X </label>
        </div>
    `
        );

    $(".submitform").append(`
        <div class="fieldoption${optionindex}-wraper">
            <input type="text" class="form-control" name="data[editable${parentID}][fieldoption][${optionindex}]" value="ตัวเลือก">
        </div>
    `);
}

function appendText() {
    $("#Canvas").append(`
    
    <div class="mb-3 form-element p-3 animate__animated animate__fadeInTopRight editable${index}-wraper">
        <div class="d-flex justify-content-between">
            <h6 class="show my-2" id="editable${index}" type="text" onclick="editText(${index});">คำถามไม่มีชื่อ</h6>
            <p class="cursor-pointer" onclick="deleteElement('editable${index}');"> X </p>
        </div>
        <input type="text" class="form-control" id="text1" placeholder="ข้อความสั้นๆ" disabled>
    </div>
    `);
    updateLabel("editable" + index, "คำถามไม่มีชื่อ", "text");
}

function appendTextarea() {
    $("#Canvas").append(`
    <div class="mb-3 form-element p-3 animate__animated animate__fadeInTopRight editable${index}-wraper">
        <div class="d-flex justify-content-between">
            <h6 class="show my-2" id="editable${index}" type="textarea" onclick="editText(${index});">คำถามไม่มีชื่อ</h6>
            <p class="cursor-pointer" onclick="deleteElement('editable${index}');"> X </p>
        </div>
        <textarea id="textarea1" rows="" cols="" class="w-100 form-control" disabled></textarea>
    </div>
    `);
    updateLabel("editable" + index, "คำถามไม่มีชื่อ", "textarea");
}

function appendCheckbox() {
    optionindex++;
    $("#Canvas").append(`
    <div class="mb-3 form-element p-3 animate__animated animate__fadeInTopRight editable${index}-wraper">
        <div class="d-flex justify-content-between">
            <h6 class="show my-2" id="editable${index}" type="checkbox" onclick="editText(${index});">คำถามไม่มีชื่อ</h6>
            <p class="cursor-pointer" onclick="deleteElement('editable${index}');"> X </p>
        </div>
        <b onclick="addOption(${index},'checkbox');" class="text-gradient-primary addnew" id="addoption${index}"> + เพิ่มตัวเลือกใหม่ </b>
        <div class="form-check fieldoption${optionindex}-wraper">
            <input class="form-check-input" type="checkbox" value="" option-for="editable${index}" id="option${optionindex}" disabled>
            <label class="form-check-label" for="option${optionindex}" parent="editable${index}" id="editoption${optionindex}" onclick="editOption(${optionindex});">ตัวเลือก</label>
            <label class="form-check-label ms-1 cursor-pointer" for="option${optionindex}" onclick="deleteOption(${optionindex});"> X </label>
        </div>
        
    </div>
    `);
    updateLabel("editable" + index, "คำถามไม่มีชื่อ", "checkbox");
}

function appendRadio() {
    optionindex++;
    $("#Canvas").append(`
    <div class="mb-3 form-element p-3 animate__animated animate__fadeInTopRight editable${index}-wraper">
        <div class="d-flex justify-content-between">
            <h6 class="show my-2" id="editable${index}" type="select" onclick="editText(${index});">คำถามไม่มีชื่อ</h6>
            <p class="cursor-pointer" onclick="deleteElement('editable${index}');"> X </p>
        </div>
        <b onclick="addOption(${index},'radio');" class="text-gradient-primary addnew" id="addoption${index}"> + เพิ่มตัวเลือกใหม่ </b>
        <div class="form-check fieldoption${optionindex}-wraper">
            <input class="form-check-input" type="radio" name="" option-for="editable${index}" id="option${optionindex}" disabled>
            <label class="form-check-label" for="option${optionindex}" parent="editable${index}" id="editoption${optionindex}" onclick="editOption(${optionindex});">ตัวเลือก</label>
            <label class="form-check-label ms-1 cursor-pointer" for="option${optionindex}" onclick="deleteOption(${optionindex});"> X </label>
        </div>
        
    </div>
    `);
    updateLabel("editable" + index, "คำถามไม่มีชื่อ", "radio");
}

function deleteElement(id) {
    console.log(id);
    $(`.${id}-wraper`).remove();
}

function deleteOption(id) {
    $(`.fieldoption${id}-wraper`).remove();
}

$(document).ready(function () {
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

    // ตั้งค่าการลากและวางสำหรับองค์ประกอบที่มีคลาส "draggable"
    $(".draggable").on("dragstart", function (event) {
        event.originalEvent.dataTransfer.setData("text/plain", event.target.id);
    });

    // ตั้งค่าการวางสำหรับองค์ประกอบที่มีคลาส "droppable" ใน "subCanvas"
    $("#Canvas").on("dragover", function (event) {
        event.preventDefault();
    });

    $("#Canvas").on("drop", function (event) {
        index++;
        event.preventDefault();
        var draggedElementId =
            event.originalEvent.dataTransfer.getData("text/plain");
        var draggedElement = $("#" + draggedElementId).clone();

        // ตรวจสอบว่าองค์ประกอบที่วางลงมาเป็น "select" หรือไม่
        switch (draggedElement.attr("id")) {
            case "radio":
                appendRadio();
                break;
            case "text":
                appendText();
                break;
            case "textarea":
                appendTextarea();
                break;
            case "checkbox":
                appendCheckbox();
                break;
            default:
                break;
        }
    });
});
