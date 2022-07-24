import ExampleComponent from "../resources/js/components/ExampleComponent";

const {mount} = require("@vue/test-utils");
//const { mount } = require("@vue/test-utils");

test("テストのためのテスト", () => {
    const component = mount(ExampleComponent);
    console.log("a");
});
