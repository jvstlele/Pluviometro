/**
 * @license MIT
 * @fileoverview All module functions
 * @copyright codewithsadee 2023 All rights reserved
 * @author codewithsadee <mohammadsadee24@gmail.com>
 */

'use strict';

export const weekDayNames = [
  "Domenica",
  "Lunedì",
  "Martedì",
  "Mercoledì",
  "Giovedì",
  "Venerdì",
  "Sabato"
];

export const monthNames = [
  "Gen",
  "Feb",
  "Mar",
  "Apr",
  "Mag",
  "giu",
  "lug",
  "Ago",
  "Set",
  "Otto",
  "Nov",
  "Dic"
];

/**
 * @param {number} dateUnix Unix date in seconds
 * @param {number} timezone Timezone shift from UTC in seconds
 * @returns {string} Date String. formate: "Sunday 10, Jan"
 */
export const getDate = function (dateUnix, timezone) {
  const date = new Date((dateUnix + timezone) * 1000);
  const weekDayName = weekDayNames[date.getUTCDay()];
  const monthName = monthNames[date.getUTCMonth()];

  return `${weekDayName} ${date.getUTCDate()}, ${monthName}`;
}

/**
 * @param {number} timeUnix Unix date in seconds
 * @param {number} timezone Timezone shift from UTC in seconds
 * @returns {string} Time string. formate: "HH:MM AM/PM"
 */
export const getTime = function (timeUnix, timezone) {
  const date = new Date((timeUnix + timezone) * 1000);
  const hours = date.getUTCHours();
  const minutes = date.getUTCMinutes();
  const period = hours >= 12 ? "PM" : "AM";

  return `${hours % 12 || 12}:${minutes} ${period}`;
}

/**
 * @param {number} timeUnix Unix date in seconds
 * @param {number} timezone Timezone shift from UTC in seconds
 * @returns {string} Time string. formate: "HH AM/PM"
 */
export const getHours = function (timeUnix, timezone) {
  const date = new Date((timeUnix + timezone) * 1000);
  const hours = date.getUTCHours();
  const period = hours >= 12 ? "PM" : "AM";

  return `${hours % 12 || 12} ${period}`;
}

/**
 * @param {number} mps Metter per seconds
 * @returns {number} Kilometer per hours
 */
export const mps_to_kmh = mps => {
  const mph = mps * 3600;
  return mph / 1000;
}

export const aqiText = {
  1: {
    level: "Buona",
    message: "La qualità dell'aria è considerata soddisfacente e l'inquinamento atmosferico presenta rischi minimi o nulli"
  },
  2: {
    level: "Giusta",
    message: "La qualità dell'aria è accettabile; tuttavia, per via di alcuni inquinanti può esserci un moderato problema di salute per un numero molto ristretto di persone insolitamente sensibili all'inquinamento atmosferico."
  },
  3: {
    level: "Moderata",
    message: "I membri dei gruppi sensibili possono subire effetti sulla salute. È improbabile che i cittadini in salute ne siano interessati."
  },
  4: {
    level: "scarsa",
    message: "Si possono sperimentare effetti sulla salute da parte di tutti i citadini; i membri di gruppi sensibili possono subire effetti più gravi sulla salute."
  },
  5: {
    level: "molto scarsa",
    message: "Avvertenze sanitarie relative alle condizioni di emergenza. L'intera popolazione ha alta probabilità di essere colpita."
  }
}