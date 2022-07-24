module.exports = {
    moduleFileExtensions: [
        "js",
        "json",
        "vue"
    ],
    transform: {
        "^.+\\.vue$": "@vue/vue3-jest",
        "^.+\\.js$": "babel-jest"
    },
    moduleNameMapper: {
        "^@/(.*)$": "<rootDir>/resources/js/$1",
    },
    collectCoverageFrom: [
        "**/*.{js,vue}",
        "!**/node_modules/**"
    ],
    testEnvironment: "jest-environment-jsdom"
}
