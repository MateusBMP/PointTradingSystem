import assert from "assert";
import { ArrivalEvent, DepartureEvent } from '../lib/events';
import { Cargo, Port, Ship } from '../lib/models';
import { Country as CountryData, Port as PortData } from "../lib/data";
import { EventProcessor } from "../lib/EventProcessor";

export default class Tester
{
    eProc: EventProcessor;
    refact: Cargo;
    kr: Ship;
    sfo: Port;
    la: Port;
    yyv: Port;

    constructor()
    {
        this.eProc = new EventProcessor();
        this.refact = new Cargo("Refactoring");
        this.kr = new Ship("King Roy");
        this.sfo = new Port("San Francisco", CountryData.US);
        this.la = new Port("Los Angeles", CountryData.US);
        this.yyv = new Port("Vancouver", CountryData.CANADA);
    }

    arrivalSetsShipsLocation() {
        let ev = new ArrivalEvent(new Date(2005,11,1), this.sfo, this.kr);

        this.eProc.process(ev);

        assert.strict.strictEqual(this.sfo, this.kr.Port);
    }

    departurePutsShipOutToSea() {
        this.eProc.process(new ArrivalEvent(new Date(2005,10,1), this.la, this.kr));
        this.eProc.process(new ArrivalEvent(new Date(2005,11,1), this.sfo, this.kr));
        this.eProc.process(new DepartureEvent(new Date(2005,11,1), this.sfo, this.kr));

        assert.strict.strictEqual(PortData.AT_SEA, this.kr.Port);
    }
}
