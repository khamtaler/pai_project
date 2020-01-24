window.onload=function () {
    var tabs = document.querySelector('.tabs')
    var li = document.querySelectorAll('a')
    var content = document.querySelectorAll('.section-content')

    tabs.addEventListener("click", function(e){
        e.preventDefault();
        if (e.target && e.target.nodeName === 'A'){
            for(var i = 0; i < li.length; i++){
                li[i].classList.remove('active');
            }
            e.target.classList.toggle('active');

            for(var i = 0; i < content.length; i++){
                content[i].classList.remove('active');

            }
            var tabName = '#' + e.target.dataset.name;
            document.querySelector(tabName).classList.toggle('active');
        }


    })

    var editModal = document.querySelector('#edit-modal');
    var editButton = document.querySelector('#edit-btn');
    var closeButton = document.querySelector('#edit-close');

    editButton.addEventListener('click', function () {
        editModal.style.display = "block";
    });
    // closeButton.addEventListener('click', function () {
    //     editModal.style.display = "none";
    // });

}

