<template>
  <v-table>
    <thead>
    <tr>
      <th class="text-left">SL</th>
      <th class="text-left">Name</th>
      <th class="text-left">Code</th>
      <th class="text-left">Total Purchase</th>
      <th class="text-left">Total Purchase Amount</th>
      <th class="text-left">Total Sale</th>
      <th class="text-left">Total Sale Amount</th>
      <th class="text-left">Profit/Loss</th>
      <th class="text-left">Stock</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(item,key) in products" :key="item.name">
      <td>{{ ++key }}</td>
      <td>{{ item.name }}</td>
      <td>{{ item.code }}</td>
      <td>{{ item.totalPurchase }}</td>
      <td>{{ item.totalSaleAmount }}</td>
      <td>{{ item.totalSale }}</td>
      <td>{{ item.totalSaleAmount }}</td>
      <td>{{ item.profitLoss }}</td>
      <td>{{ item.totalStock }}</td>
    </tr>
    </tbody>
  </v-table>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      products: []
    }
  },
  mounted() {
    axios
      .get('http://127.0.0.1:8000/api/v1/report/product')
      .then((response) => {
        this.products = response.data.data
      })
  }
}
</script>
