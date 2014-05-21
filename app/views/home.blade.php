@extends('layout')

@section('content')

<div data-alert class="alert-box">Student created successfully</div>
<div data-alert class="alert-box success">Student created successfully</div>
<div data-alert class="alert-box warning"><i class="fi-lightbulb"></i> Please correct the following errors before you continue</div>
<div data-alert class="alert-box alert">Error processing your request</div>
<div data-alert class="alert-box secondary">Some information</div>
<div data-alert class="alert-box info">Some information <a href="#" class="close">&times;</a></div>

      <!--<p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>
      <p>Duis semper, massa venenatis commodo scelerisque, ligula nulla tempor eros, vitae pretium urna dolor a justo. Maecenas lectus sapien, dictum et lorem ac, dapibus tempus enim. Quisque aliquam vel eros in iaculis. Proin a arcu et nibh facilisis lacinia sit amet et dolor. Fusce bibendum quam turpis, nec pretium magna lobortis ac. Aenean a dolor nisi. Suspendisse dapibus sagittis mauris at fermentum. Aenean hendrerit metus turpis, quis auctor massa aliquam sed.</p>
      <p>Ut eleifend mattis orci, in dignissim risus vehicula a. Nam sit amet pharetra elit, non fringilla sem. Fusce eget ante nec enim condimentum lobortis id ac ipsum. Pellentesque vel erat et sem vulputate consectetur. Curabitur congue nunc sit amet nisl consequat, nec scelerisque velit mattis. Vivamus porta augue consectetur, bibendum leo ac, bibendum felis. Sed euismod malesuada nulla, eu ultrices dolor consequat eu. Vivamus gravida mattis volutpat. Donec eget ultricies nulla, sed blandit augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum vestibulum neque, eu scelerisque nunc cursus vel. Cras a enim vitae libero fringilla auctor et sed magna.</p>
      <p>Vivamus volutpat lacus neque, in viverra purus eleifend id. Morbi sed dignissim augue. Donec convallis eros sem, at pellentesque quam sollicitudin id. Quisque neque enim, pharetra eu eros sit amet, lacinia tempus lectus. Nam nec vehicula tellus, eu venenatis dolor. Praesent est tellus, dignissim at orci nec, sagittis venenatis tellus. Duis aliquam tempor odio in congue. Morbi et nunc in nisi porta gravida ac eu lacus. In rhoncus rutrum nisl, sit amet pellentesque nunc fringilla sed. Vivamus feugiat mattis justo, a varius lorem faucibus sed. Pellentesque laoreet, nisi ac sodales commodo, quam ligula molestie est, non molestie massa nisl vel sapien. Etiam risus tortor, pellentesque ut sagittis ac, blandit in sapien. Maecenas eu purus elit. Morbi lorem libero, placerat sed interdum id, lacinia nec enim. Phasellus vestibulum nisl vitae mauris aliquet porttitor. Sed sapien neque, pretium nec est et, ornare consectetur dolor.</p>-->

<!-- <div class="panel"> -->

   <form>
<fieldset>
  <div class="row">
    <div class="large-12 columns">
      <label>Input Label
        <input type="text" placeholder="large-12.columns" />
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-4 small-12 columns">
      <label>Input Label
        <input type="text" placeholder="large-4.columns" />
      </label>
    </div>
    <div class="large-4 small-12 columns">
      <label>Input Label
        <input type="text" placeholder="large-4.columns" />
      </label>
    </div>
    <div class="large-4 small-12 columns">
      <div class="row collapse">
        <label>Input Label</label>
        <div class="small-9 columns">
          <input type="text" placeholder="small-9.columns" />
        </div>
        <div class="small-3 columns">
          <span class="postfix">.com</span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Select Box
        <select>
          <option value="husker">Husker</option>
          <option value="starbuck">Starbuck</option>
          <option value="hotdog">Hot Dog</option>
          <option value="apollo">Apollo</option>
        </select>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-6 columns">
      <label>Choose Your Favorite</label>
      <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Red</label>
      <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
    </div>
    <div class="large-6 columns">
      <label>Check these out</label>
      <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
      <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>Textarea Label
        <textarea placeholder="small-12.columns"></textarea>
      </label>
    </div>
  </div>

  <div class="row">
      <div class="large-12 columns">
         <button class="">Submit</button>
         <button class="">Save</button>
         <button class="secondary">Cancel</button>
         <button class="alert">Delete</button>
      </div>
  </div>

</fieldset>
</form>
<!-- </div> -->
@stop
