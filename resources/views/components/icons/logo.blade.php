<svg {{ $attributes }} viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <style>
      .tag-bg {
        fill: {{ $bg ?? '#0A210B' }};
        stroke: {{ $border ?? '#D6D6D6' }};
        stroke-width: 2px;
      }
      .text {
        fill: {{ $text ?? '#F8F9FA' }};
      }
    </style>

    <!-- Fundo com borda condicional -->
    <path class="tag-bg" d="M5,50 L55,5 L195,5 L195,195 L55,195 L5,150 Z" />

    <!-- Textos -->
    <text class="text" x="100" y="95" font-family="Courier New" font-size="100" font-weight="bold" text-anchor="middle">JS</text>
    <text class="text" x="100" y="155" font-family="Courier New" font-size="80" text-anchor="middle">
      <tspan x="100" dy="0">DEV</tspan>
    </text>
  </svg>
