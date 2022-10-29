

<header>
  <script>
    function redirectPage(input) {
      if (input === 'github'){
        window.location.href="https://github.com/rpet064";
      } else if (input === 'email'){
        window.location.href="mailto: rpether@hotmail.co.nz";
      } else if (input === 'location'){
        window.location.href="https://www.google.com/maps/place/Auckland/@-36.859482,174.425919,10z/data=!3m1!4b1!4m5!3m4!1s0x6d0d47fb5a9ce6fb:0x500ef6143a29917!8m2!3d-36.8508827!4d174.7644881";
      } else {
        console.log('input not recognised')
      }
  }
  </script>
      <nav>
        <div class="logo">
          <p id="logo">Terrasu<p>
        </div>
        <ul class="list-item">
            <button title="Github" onClick="redirectPage('github')"><i class="fab fa-github"></i></button>
            <button title="Email" onClick="redirectPage('email')"><i class="far fa-envelope"></i></button>
            <button title="Location" onClick="redirectPage('location')"><i class="fas fa-map-marker-alt"></i></button>
          </ul>
      </nav>
    </header>

