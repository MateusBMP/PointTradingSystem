import { DomainEvent } from "./DomainEvent";

/** Processador de eventos do tipo DomainEvent. */
export class EventProcessor {
    log: Array<DomainEvent>;

    /**
     * Constrói o processador. Nele encontra-se uma lista de eventos processados.
     */
    constructor() {
        this.log = new Array();
    }

    /**
     * Processa o DomainEvent e.
     * @param {DomainEvent} e 
     */
    public process(e: DomainEvent) {
        e.process()
        this.log.push(e);
    }
}