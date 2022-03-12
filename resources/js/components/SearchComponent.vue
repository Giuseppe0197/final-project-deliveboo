<template>
  <div class="restaurant-search">
    <div class="background-search">
      <h1 class="title-searchbar">Cerca i tuoi ristoranti preferiti!</h1>
      <div class="d-flex container container-cards">
        <!-- container per la ricerca tramite barra e checkbox -->

        <div class="search-bar-checkbox container-fluid">
          <div class="row">
            <!-- searchbar per nome ristorante -->
            <input
              class="searchbar"
              type="search"
              v-model="searchRestaurant"
              @keyup.enter="search"
              placeholder="Ricerca ristorante"
            />

            <!-- bottone per cercare il ristorante tramite nome -->

            <button class="search-button" @click="search">Cerca</button>
          </div>

          <div class="checkboxes-container row d-flex">
            <span class="grey-text mb-2">Filtra per categorie</span>
            <div
              v-for="category in categories"
              :key="category.id"
              class="checkboxesSearch"
            >
              <input
                class="category-check"
                type="checkbox"
                :value="category.id"
                v-model="checkbox"
              />{{ category.name }}
            </div>
          </div>
        </div>
        <!--container ristoranti trovati tramite nome -->

        <div class="container-restaurants container-fluid">
          <div class="row">
            <!-- ristoranti in primo piano -->

            <div class="d-flex flex-wrap" v-if="restaurants.length === 0">
              <div
                v-for="(rest, j) in restaurants_default"
                :key="'A' + j"
                class="restaurant-found restaurant-card"
              >
                <!-- card ristoranti primo piano -->
                <div class="card-body text-start">
                  <a @click.prevent="showMenu(rest.id)">
                    <div class="container-image">
                      <img
                        class="card-img-top"
                        :src="'/storage/images/' + rest.image"
                        alt=""
                      />
                    </div>
                    <div class="container-text-card">
                      <h5 class="card-title my-1">
                        <strong> {{ rest.restaurant_name }}</strong>
                      </h5>
                      <p class="card-text my-1">
                        {{ rest.restaurant_phone }}
                      </p>
                      <p class="card-text my-1">{{ rest.email }}</p>
                      <p class="card-text my-1">{{ rest.address }}</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- card ristoranti -->
            <div v-else class="d-flex flex-wrap">
              <div
                v-for="(restaurant, i) in restaurants"
                :key="i"
                class="restaurant-found restaurant-card"
              >
                <div class="card-body text-start">
                  <a @click="showMenu(restaurant.id)">
                    <div class="container-image">
                      <img
                        class="card-img-top"
                        :src="'/storage/images/' + restaurant.image"
                        alt=""
                      />
                    </div>
                    <div class="container-text-card">
                      <h5 class="card-title my-1">
                        <strong> {{ restaurant.restaurant_name }}</strong>
                      </h5>
                      <p class="card-text my-1">
                        {{ restaurant.restaurant_phone }}
                      </p>
                      <p class="card-text my-1">{{ restaurant.email }}</p>
                      <p class="card-text my-1">{{ restaurant.address }}</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      restaurants: [],
      restaurantsCat: [],
      searchRestaurant: "",
      checkbox: [],
      categories: [],
    };
  },

  props: {
    restaurants_default: Array,
  },

  mounted() {
    axios
      .get("/find/categories")
      .then((r) => (this.categories = r.data))
      .catch((e) => console.error(e));
  },

  //uso il watch perche sfrutta la reattività di Vue
  watch: {
    checkbox(newVal, oldVal) {
      this.searchRestaurant = "";

      console.log(newVal, oldVal);
      this.findByResataurantCategoryId(newVal);
    },
  },

  methods: {
    search() {
      this.findByResataurantCategoryId();
    },

    findByResataurantCategoryId() {
      let queryParam = "/find/restaurant_by_cat";

      if (this.checkbox.length > 0 && this.searchRestaurant.length > 0) {
        queryParam += "?ids=" + `${this.checkbox}&q=` + this.searchRestaurant;
      } else if (
        this.checkbox.length == 0 &&
        this.searchRestaurant.length == 0
      ) {
      } else if (this.checkbox.length > 0) {
        queryParam += "?ids=" + `${this.checkbox}`;
      } else {
        queryParam += "?q=" + this.searchRestaurant;
      }

      axios
        .get(queryParam)
        .then((r) => {
          this.restaurants = r.data.data;
          console.log(this.restaurants);

          for (let i = 0; i < this.restaurants.length; i++) {
            if (this.restaurants[i].user_id) {
              this.restaurants[i].id = this.restaurants[i].user_id;
            }
          }
        })

        .catch((e) => console.error(e));
    },

    showMenu(id) {
      window.location.href = `/show/restaurant/${id}`;
    },
  },
};
</script>
<style scoped lang="scss">
.background-search {
  background-color: #fbfbfb;
}

.container-cards {
  max-width: 90%;
  margin-left: 5%;
  padding: 40px 0px;
}

.grey-text {
  color: #585c5c;
  font-size: 15px;
}

.restaurant-found {
  width: 18rem;
}

.card-img-top {
  width: 18rem;
}

.search-bar-checkbox {
  background-color: white;
  padding: 20px 0 20px 30px;
  border-radius: 10px;
  margin-right: 60px;
  height: 670px;
  -moz-box-shadow: 0 0 15px #d7d7d7;
  -webkit-box-shadow: 0 0 15px #d7d7d7;
  box-shadow: 0 0 15px #d7d7d7;

  input {
    border: 1px solid #bac3c3;
    background-color: #fff;
    font-size: 16px;
    padding: 9px 10px;
    border-radius: 3px;
    max-height: 40px;
    margin: 0 20px 10px 0;
  }

  .searchbar {
    width: 80%;
  }
}

.title-searchbar {
  text-align: center;
  padding-top: 45px;
}

.search-button {
  color: #fff;
  background: #00ccbc;
  padding: 14px 24px;
  border-radius: 4%;
  border-style: none;
  margin-bottom: 15px;

  &:hover {
    color: #fff;
    background-color: #05b7a8;
  }
}

.checkboxes-container {
  font-size: 17px;
  flex-direction: column;
  input {
    margin-top: 8px;
    margin-right: 10px;
  }
}

/* css contenitore ristiranti trovati */

.container-restaurants {
  .restaurant-found {
    background-color: white;
    border-radius: 5px;
    margin-right: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    -moz-box-shadow: 0 0 15px #d7d7d7;
    -webkit-box-shadow: 0 0 15px #d7d7d7;
    box-shadow: 0 0 15px #d7d7d7;

    .card-body {
      width: 80%;
      padding: 0;

      img {
        object-fit: cover;
        border-radius: 5px;
        height: 160px;
      }
    }

    .button-show-restaurant {
      background-color: #00ccbc;
      border-radius: 10px;
      border: none;
      color: white;
      font-size: 15px;
      font-weight: bold;
      width: 50%;
      padding: 5px;
      margin-bottom: 10px;
    }
  }

  .card-title {
    padding: 12px 0 10px 12px;
  }

  .card-text {
    padding-left: 15px;
  }
}

.container-text-card {
  padding-bottom: 30px;
  line-height: 16px;
}

// media query
@media only screen and (max-width: 1160px) {
  // .container-cards {
  // }

  .search-bar-checkbox {
    width: 100%;
    margin-right: 21%;
    height: 370px;
    margin-bottom: 50px;

    .row {
      margin-left: 5%;
    }

    .searchbar {
      width: 40%;
    }

    .category-check {
      margin: 0px 5px 0 10px;
    }

    .checkboxes-container {
      flex-direction: row;
      width: 90%;
      margin-left: 5%;
    }
  }

  .restaurant-search {
    .container {
      flex-direction: column;
    }
  }

  .search-button {
    height: 40px;
    padding: 9px 24px;
  }
}

@media only screen and (max-width: 766px) {
  .restaurant-found {
    width: 16rem;
    margin-left: 50px;
  }

  .card-img-top {
    width: 16rem;
  }
}
</style>