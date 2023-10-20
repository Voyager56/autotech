import { defineRule } from "vee-validate";
import { required, min } from "@vee-validate/rules";

defineRule("required", required);
defineRule("min", min);
defineRule("time", (value) => {
    if (!value) {
        return true;
    }
    const [hours, minutes, seconds] = value.split(":");
    return (
        parseInt(hours) <= 24 &&
        parseInt(minutes) <= 60 &&
        parseInt(seconds) <= 60
    );
});
