<!-- meow -->
<?php
  $type = $blueprint->dbGet('brainrot', 'type');

  $brainrots = [
    'none' => '',
    'subwaysurfers' => 'OAX64KQQYas',
    'minecraft' => 'CJ5-1a1iUFE',
    'andrewtate' => '84p36OjjE64',
    'slime' => 'lcPTDc9vHkE',
    'memes' => 'ehFpymQQYx4',
    'skibiditoilet' => 'ykbh0OFCa80',
    'gegagedigedagedago' => '4xCouQ4n_Rw',
  ];

  $custom = $blueprint->dbGet('brainrot', 'custom');
  if ($custom) {
    $brainrots['custom'] = $custom;
  }

  if ($type == 'custom' && !$custom) {
    $type = 'none';
  }

  $video = $type == 'random' ? $brainrots[array_rand($brainrots)] : $brainrots[$type];
?>

<style>
  .brainrotVideo {
    position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 10;
    background: #242323;
    border-radius: 5px;
    width: 300px;
    height: calc(300px * 16 / 9);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .brainrotVideo iframe {
    position: absolute;
    height: 100%;
    width: 950px;
    border-radius: 5px;
  }

  .brainrotX {
    position: absolute;
    text-align: center;
    top: 15px;
    right: 15px;
    color: white;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    z-index: 20;
    background: #242323;
    border-radius: 50%;
    width: 30px;
    height: 30px;
  }
</style>

@if ($type != 'none')
  <div class="brainrotVideo">
    <p class="brainrotX">x</p>

    <iframe src="https://www.youtube.com/embed/{{ $video }}?controls=0&loop=1&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <script>
    document.querySelector('.brainrotX').addEventListener('click', function() {
      document.querySelector('.brainrotVideo').style.display = 'none';
      document.querySelector('.brainrotVideo iframe').src = '';
    });
  </script>
@endif