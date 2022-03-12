<template>
  <div class="restaurant-search">
    <div class="background-search">
      <h1 class="title-searchbar">Cerca i tuoi ristoranti preferiti!</h1>
      <div class="d-flex container">
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
            <label 
              v-for="category in categories"
              :key="category.id"
              class="checkboxesSearch mb-0"
            >{{ category.name }}
              
              <input
                class="category-check"
                type="checkbox"
                :value="category.id"
                v-model="checkbox"
              />
              <span class="checkmark"></span>
            </label >
          </div>
        </div>
        <!--container ristoranti trovati tramite nome -->

        <div class="container-restaurants container-fluid">
          <div class="row">
            <div
              class="text-center col-md-6 col-sm-12"
              v-if="restaurants.length === 0"
            >
              <!-- ---------------------------------------------------------------------------------------------------- -->
              <!-- ristoranti in primo piano -->
              <!-- ----------------------------------------------------------------- -->
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

  mounted() {
    axios
      .get("/find/categories")
      .then((r) => (this.categories = r.data))
      .catch((e) => console.error(e));
  },

  //uso il watch perche sfrutta la reattività di Vue
  watch: {
    checkbox(newVal, oldVal) {
        this.searchRestaurant = '';

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

.container {
  padding: 40px 0px;
}

.grey-text {
  color: #585c5c;
  font-size: 15px;
}

.search-bar-checkbox {
  background-color: white;
  padding: 20px 0 20px 30px;
  border-radius: 10px;
  margin-right: 125px;
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

  .checkboxesSearch {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 19px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    // nascono la checkbox di default
    input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }
    // creo una checkbox personalizzata 
    .checkmark {
      position: absolute;
      top: 9px;
      left: 0;
      height: 15px;
      width: 15px;
      // background-color: #eee;
      border: 2px solid #bac3c3;
      border-radius: 50%;
    }
    // quando la checkbox è selezionata cambio background 
    input:checked ~ .checkmark {
      background-color: #00ccbc;
    }
  
    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
  
    /* Show the checkmark when checked */
    input:checked ~ .checkmark:after {
      display: block;
    }
  
    /* Style the checkmark/indicator */
    .checkmark::after {
      left: 4px;
      top: -1px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
  }

  // on hover aggiungo colore background 
  .checkboxesSearch:hover .checkmark {
    border: 1px solid #00ccbc;
  }
}

/* css contenitore ristiranti trovati */

.container-restaurants {
  width: 70%;
  margin: 0 auto;

  .restaurant-found {
    background-color: white;
    border-radius: 5px;
    margin-right: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    -moz-box-shadow: 0 0 15px #d7d7d7;
    -webkit-box-shadow: 0 0 15px #d7d7d7;
    box-shadow: 0 0 15px #d7d7d7;
    width: 288px;

    .card-body {
      width: 100%;
      padding: 0;

      img {
        object-fit: cover;
        border-radius: 5px;
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
@media only screen and (max-width: 770px) {
  .search-bar-checkbox {
    width: 80%;
    margin-left: 10%;
    height: 370px;
    margin-bottom: 50px;

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

  // media query card ristorante
  .restaurant-found {
    margin-left: 8%;
  }
}
</style>