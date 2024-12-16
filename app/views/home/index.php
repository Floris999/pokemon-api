<?php require APPROOT . '/views/inc/nav.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class='text-2xl	text-center m-4'><?php echo $data['title']; ?></h1>
<img src="<?php echo URLROOT; ?>/public/images/pokeapi.png" alt="headerImage" />
<div class='flex justify-center m-9 max-w-screen-lg mx-auto'>
  <ul class='flex flex-wrap justify-center gap-14'>
    <?php if (isset($data['pokemonData']) && is_array($data['pokemonData'])): ?>
      <?php foreach ($data['pokemonData'] as $pokemon): ?>
        <li class='w-1/4 shadow-lg shadow-yellow-100 p-4'>
          <img class='w-full h-48 object-cover' src='<?php echo $pokemon['image']; ?>' alt='<?php echo $pokemon['name']; ?>'>
          <div class='p-4'>
            <div class='text-gray-900 font-bold text-xl mb-2'><?php echo ucfirst($pokemon['name']); ?></div>
            <p class='text-gray-700 text-base'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
          </div>
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="about/<?php echo $pokemon['id']; ?>">Read More</a>
          </button>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>No Pokémon names found.</li>
    <?php endif; ?>
  </ul>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>