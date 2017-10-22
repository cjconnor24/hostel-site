
<?php include('includes/header.php');?>



    <section id="content">

        <div class="wrapper">

            <h1>Travel Survey</h1>

            <p>To get in contact with us, simply fill in the form below</p>

            <style type="text/css">
                [data-drop-target] {
                    height: 400px;
                    width: 200px;
                    margin: 2px;
                    background-color: #dedede;
                    float: left;
                }
                .dragable::after {
                    content: ' ';
                    display:block;
                    clear:both;
                }

                .box {
                    width: 200px;
                    height: 200px;
                }

                .pink {
                    background-color: #FFCCFF;
                }

                .blue {
                    background-color: #CCFFFF;
                }
            </style>

            <div class="dragable">
            <div data-drop-target="true">
                <div id="box1" draggable="true" class="box pink"></div>
                <div id="box2" draggable="true" class="box blue"></div>
            </div>
            <div data-drop-target="true"></div>
            </div>

            <script type="text/javascript">
                function handleDragStart(e) {
                    e.dataTransfer.setData("text", this.id);
                }

                function handleDrop(e) {
                    e.preventDefault();

                    if (e.type != "drop") {
                        return;
                    }

                    var draggedId = e.dataTransfer.getData("text");
                    var draggedEl = document.getElementById(draggedId);

                    if (draggedEl.parentNode == this) {

                        return;
                    }

                    draggedEl.parentNode.removeChild(draggedEl);

                    this.appendChild(draggedEl);

                }

                var draggable = document.querySelectorAll("[draggable]");
                var targets = document.querySelectorAll("[data-drop-target]");

                for (var i = 0; i < draggable.length; i++) {
                    draggable[i].addEventListener("dragstart", handleDragStart);
                }

                for (i = 0; i < targets.length; i++) {
                    targets[i].addEventListener("dragover", handleDrop);
                    targets[i].addEventListener("drop", handleDrop);
                }

            </script>


        </div>

    </section>

<?php include('includes/footer.php');?>

