import { Country as CountryModel, Port as PortModel } from "./models";

export const Country = {
    US: new CountryModel("United States"),
    CANADA: new CountryModel("Canada"),
    AT_SEA: new CountryModel("At Sea"),
    NULL: new CountryModel("Null")
};

export const Port = {
    AT_SEA: new PortModel("At sea", Country.AT_SEA),
    NULL: new PortModel("Null", Country.NULL)
};
