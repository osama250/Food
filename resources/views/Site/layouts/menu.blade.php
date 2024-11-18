<body>
    <div class="side-nav-menu min-vh-100 position-fixed d-flex bottom-0">

        <div class="nav-tab d-flex flex-column justify-content-between min-vh-100 p-4">
          <div class="links">
            <ul class="list-unstyled overflow-hidden">
                <li class="py-2 position-relative cursor-pointer" onclick="showSearchInputs()">Search</li>
                <li class="py-2 position-relative cursor-pointer" onclick="getCategories()">Categories</li>
                <li class="py-2 position-relative cursor-pointer" onclick="getArea()">Area</li>
                <li class="py-2 position-relative cursor-pointer" onclick="getIngredients()">Ingriedients</li>
                <li class="py-2 position-relative cursor-pointer" onclick="showContacts()">Contact Us</li>
            </ul>
          </div>

          <div class="nav-footer">
              <div class="icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-solid fa-globe"></i>
              </div>

              <div class="footer">
                <p>hanan elzftawy <br>Reserved.</p>
              </div>
          </div>

        </div>

        <div class="nav-header d-flex flex-column justify-content-between py-4 text-center px-2 bg-white text-black">
          <img src="imgs/logo.png" class="logo">
          <i class="fa-solid fa-align-justify fa-2x open-close-icon"></i>
          <div>
            <i class="fa-solid fa-globe d-block"></i>
            <i class="fa-solid fa-share-nodes"></i>
          </div>
        </div>

    </div>




    <div class="container w-75" id="searchContainer">

    </div>

    <div class="container">
    <div class="row py-5 g-3" id="rowData">

    </div>
    </div>

</body>
