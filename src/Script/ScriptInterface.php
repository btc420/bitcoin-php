<?php

namespace BitWasp\Bitcoin\Script;

use BitWasp\Bitcoin\Script\Parser\Parser;
use BitWasp\Bitcoin\SerializableInterface;
use BitWasp\Buffertools\BufferInterface;

interface ScriptInterface extends SerializableInterface
{
    /**
     * @return BufferInterface
     */
    public function getScriptHash();

    /**
     * @return BufferInterface
     */
    public function getWitnessScriptHash();

    /**
     * @return Parser
     */
    public function getScriptParser();

    /**
     * @return Opcodes
     */
    public function getOpcodes();

    /**
     * Returns boolean indicating whether script
     * was push only. If true, $ops is populated
     * with the contained buffers
     * @param array $ops
     * @return bool
     */
    public function isPushOnly(array &$ops = null);

    /**
     * @param WitnessProgram|null $witness
     * @return bool
     */
    public function isWitness(& $witness);

    /**
     * @param BufferInterface $scriptHash
     * @return bool
     */
    public function isP2SH(& $scriptHash);

    /**
     * @param bool $accurate
     * @return int
     */
    public function countSigOps($accurate = true);

    /**
     * @param ScriptInterface $scriptSig
     * @return int
     */
    public function countP2shSigOps(ScriptInterface $scriptSig);

    /**
     * @param ScriptInterface $scriptSig
     * @param ScriptWitnessInterface $witness
     * @param int $flags
     * @return int
     */
    public function countWitnessSigOps(ScriptInterface $scriptSig, ScriptWitnessInterface $witness, $flags);

    /**
     * @param ScriptInterface $script
     * @return bool
     */
    public function equals(ScriptInterface $script);
}
