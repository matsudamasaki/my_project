<template>
  <div>
    <button v-on:click="showModal = true">Open Modal</button>

    <div v-if="showModal" class="modal-overlay" v-on:click.self="closeModal">
      <div class="modal">
        <button class="close-button" v-on:click="closeModal">X</button>
        <section class="tab-layout">
          <div class="tabs">
            <button class="tab" v-on:click="page = 1">{{ tabName1 }}</button>
            <button class="tab" v-on:click="page = 2">{{ tabName2 }}</button>
            <button class="tab" v-on:click="page = 3">{{ tabName3 }}</button>
          </div>
          <div class="content" :class="{ show: page == 1 }">
            <p>{{ tabBody1 }}</p>
          </div>
          <div class="content" :class="{ show: page == 2 }">
            <p>{{ tabBody2 }}</p>
          </div>
          <div class="content" :class="{ show: page == 3 }">
            <p>{{ tabBody3 }}</p>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>


<script>
import { ref } from "vue";
import Axios from "axios";

export default {
  setup(props, context) {
    const page = ref(1);
    const showModal = ref(false);
    const closeModal = () =>{
        showModal.value = false;
    };
    return {
      page,
      showModal,
      closeModal,
    };
  },
  props: {
    tabName1 : String,
    tabName2 : String,
    tabName3 : String,
    tabBody1 : String,
    tabBody2 : String,
    tabBody3 : String,
  },
};
</script>

<style lang="scss">
.sample-component {
  & .tab-layout {
    padding: 0;
    margin: 0;

    & * {
      padding: 0;
      margin: 0;
    }

    & .tabs {
      display: flex;
      flex-wrap: nowrap;
      justify-content: left;

      & .tab {
        width: 100%;
        line-height: 2rem;

        color: black;
        background-color: #ddd;

        transition: all 500ms;
        &:hover {
          color: white;
          background-color: #1d2946;
        }
      }
    }

    & .content {
      max-height: 0rem;
      opacity: 0;

      transition: all 500ms;
      &.show {
        max-height: 4rem;
        opacity: 1;
      }
    }
  }
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;

  .modal {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 500px;
    max-width: 80%;
    position: relative;

    .close-button {
      position: absolute;
      top: 3px;
      right: 1px;
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }

    .content {

      &.show {
        display: block;
      }
    }
  }
}
</style>
