<!-- <h2 class="section-en-title sofia">SEARCH</h2> -->
<h2 class="section-en-title sofia">PRICE</h2>
<div class="en-title-border"></div>
<h3 class="section-ja-title ta-c">最新の買取価格 かんたん検索BOX</h3>

<div class="latest-purchase-price">
  <div class="search-box">
    <div class="search-box-item">
      <p class="bold color-white">売りたい商品・ブランドから検索</p>
			<div class="search-box-form">
				<input type="text" v-model="searchText" placeholder="商品を選択する">
				<button @click="search(searchText)"></button>
			</div>
    </div>
  </div>

  <div class="search-popular-tag">
    <ul>
      <li v-for="tag in tags">
        <span class="item-tag" @click="search(tag.text)">{{ tag.text }}</span>
      </li>
    </ul>
  </div>

  <div class="search-list">
    <template v-if="isLoading">
      <!-- ローディングアニメーション -->
    </template>
    <template v-else>
      <template v-if="items.length > 0">
        <ul>
          <li v-for="item in items">
            <img v-if="item.image" :src="item.image" :alt="item.name">
            <div class="search-list-content">
              <div class="d-b ta-c">
                <div class="item-tag">{{ item.classification_name }}</div>
              </div>
              <h5 class="color-red bold ta-c search-list-tag">{{ item.name }}</h5>
              <p class="search-list-txt">{{ item.description }}</p>
              <div class="search-item-price">
                <div class="d-f ai-c jc-c">
                  <div class="ttl-hr-border"></div>
                  <p class="ta-c small-font-size search-item-price-ttl bold">買取金額</p>
                  <div class="ttl-hr-border"></div>
                </div>
                <p class="color-red ta-c search-item-txt sofia">{{ new Intl.NumberFormat().format(item.price) }}<span class="color-black ml-4">円</span></p>
              </div>
            </div>
          </li>
        </ul>
      </template>
      <template v-else>
        <p>見つかりません</p>
      </template>
    </template>
  </div>
</div>

<script>
  const LatestPurchasePrice = {
    data() {
      return {
        isLoading: true,
        items: [],
        searchText: '',
        tags: [
          { id: 0, text: '金' },
          { id: 1, text: 'ロレックス' },
          { id: 2, text: 'エルメス' },
          { id: 3, text: 'プラチナ' },
        ],
      }
    },
    methods: {
      search(text) {
        this.isLoading = true
        axios.get('<?php echo esc_url(home_url('wp-json/customize/search_latest_purchase_price')); ?>', {
          params: {
            search: text,
          }
        })
        .then(function (response) {
          // handle success
          console.log(response)
          this.items = response.data
          console.log(this.items)
        }.bind(this))
        .catch(function (error) {
          // handle error
          console.log(error)
        }.bind(this))
        .then(function (error) {
          this.isLoading = false
        }.bind(this))
      },
    },
    mounted() {
      this.isLoading = false
      this.search('')
    }
  }

  Vue.createApp(LatestPurchasePrice).mount('.latest-purchase-price')
</script>