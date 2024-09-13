<?php 
    include "views/includes/header.php";
?>

<div class="container" style="margin-top: 100px;">
    <div class="row-flex">
      <div class="flex-column-form">
        <h3>
          Make a book
        </h3>
      <form class="media-centered">
          <div class="form-group">
            <p>
              Leave your information here for a reservation
            </p>
            <input type="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="exampleInputphoneNumber1" placeholder="Enter your phone number">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
      <div class="opening-time">
        <h3>
          Opening times
        </h3>
        <p>
         <span>Monday—Thursday: 06:00 — 23:00</span> 
         <span>Friday—Saturday: 7:00 — 23:00 </span>
         <span>Sunday: 7:00 — 18:00</span>
        </p>
      </div>
      <div class="contact-adress">
        <h3>
          Contact
        </h3>
        <p>
          <span>000 000 0000</span>
          <span>victoria 2222</span>
          <span>London, 1231241 CA</span>
        </p>
      </div>
    </div>
    </div>

<?php 
    include "views/includes/footer.php";
?>