<?php

namespace Robier\SIG;

/**
 * Class Signal
 */
class Signal
{
    /**
     * @var int
     */
    protected $type;

    public function __construct(int $type)
    {
        $this->type = $type;
    }

    public function get(): int
    {
        return $this->type;
    }

    /**
     * The SIGHUP signal is sent to a process when its controlling terminal is closed.
     *
     * @return self
     */
    public static function hangup(): self
    {
        return new static(SIGHUP);
    }

    /**
     * The SIGINT signal is sent to a process by its controlling terminal when a user wishes to interrupt the process.
     * This is typically initiated by pressing Ctrl+C, but on some systems, the "delete" character or "break" key
     * can be used.
     *
     * @return self
     */
    public static function interrupt(): self
    {
        return new static(SIGINT);
    }

    /**
     * The SIGQUIT signal is sent to a process by its controlling terminal when the user requests that the process
     * quit and perform a core dump.
     *
     * @return self
     */
    public static function quit(): self
    {
        return new static(SIGQUIT);
    }

    /**
     * The SIGILL signal is sent to a process when it attempts to execute an illegal, malformed, unknown, or
     * privileged instruction.
     *
     * @return self
     */
    public static function illegal(): self
    {
        return new static(SIGILL);
    }

    /**
     * The SIGTRAP signal is sent to a process when an exception (or trap) occurs: a condition that a debugger has
     * requested to be informed of — for example, when a particular function is executed, or when a particular
     * variable changes value.
     *
     * @return self
     */
    public static function trap(): self
    {
        return new static(SIGTRAP);
    }

    /**
     * The SIGABRT and SIGIOT signal is sent to a process to tell it to abort, i.e. to terminate.
     *
     * @return self
     */
    public static function abort(): self
    {
        return new static(SIGABRT);
    }

    /**
     * The SIGBUS signal is sent to a process when it causes a bus error. The conditions that lead to the signal being
     * sent are, for example, incorrect memory access alignment or non-existent physical address.
     *
     * @return self
     */
    public static function busError(): self
    {
        return new static(SIGBUS);
    }

    /**
     * The SIGFPE signal is sent to a process when it executes an erroneous arithmetic operation, such as division by
     * zero (the name "FPE", standing for floating-point exception, is a misnomer as the signal covers
     * integer-arithmetic errors as well).
     *
     * @return self
     */
    public static function floatingPointException(): self
    {
        return new static(SIGFPE);
    }

    /**
     * The SIGKILL signal is sent to a process to cause it to terminate immediately (kill). In contrast to SIGTERM and
     * SIGINT, this signal cannot be caught or ignored, and the receiving process cannot perform any clean-up upon
     * receiving this signal.
     *
     * @return self
     */
    public static function kill(): self
    {
        return new static(SIGKILL);
    }

    /**
     * The SIGUSR1 and SIGUSR2 signals are sent to a process to indicate user-defined conditions.
     *
     * @return self
     */
    public static function userDefinedConditions1(): self
    {
        return new static(SIGUSR1);
    }

    /**
     * The SIGSEGV signal is sent to a process when it makes an invalid virtual memory reference, or segmentation
     * fault, i.e. when it performs a segmentation violation.
     *
     * @return self
     */
    public static function segmentationFault(): self
    {
        return new static(SIGSEGV);
    }

    /**
     * The SIGUSR1 and SIGUSR2 signals are sent to a process to indicate user-defined conditions.
     *
     * @return self
     */
    public static function userDefinedConditions2(): self
    {
        return new static(SIGUSR2);
    }

    /**
     * The SIGPIPE signal is sent to a process when it attempts to write to a pipe without a process connected to
     * the other end.
     *
     * @return self
     */
    public static function pipe(): self
    {
        return new static(SIGPIPE);
    }


    /**
     * The SIGALRM, SIGVTALRM and SIGPROF signal is sent to a process when the time limit specified in a call to a
     * preceding alarm setting function (such as setitimer) elapses. SIGALRM is sent when real or clock time elapses.
     *
     * @return self
     */
    public static function alarm(): self
    {
        return new static(SIGALRM);
    }


    /**
     * The SIGTERM signal is sent to a process to request its termination. Unlike the SIGKILL signal, it can be caught
     * and interpreted or ignored by the process. This allows the process to perform nice termination releasing
     * resources and saving state if appropriate. SIGINT is nearly identical to SIGTERM.
     *
     * @return self
     */
    public static function terminate(): self
    {
        return new static(SIGTERM);
    }


    /**
     * The SIGCHLD signal is sent to a process when a child process terminates, is interrupted, or resumes after
     * being interrupted. One common usage of the signal is to instruct the operating system to clean up the resources
     * used by a child process after its termination without an explicit call to the wait system call.
     *
     * @return self
     */
    public static function child(): self
    {
        return new static(SIGCHLD);
    }


    /**
     * The SIGCONT signal instructs the operating system to continue (restart) a process previously paused by the
     * SIGSTOP or SIGTSTP signal. One important use of this signal is in job control in the Unix shell.
     *
     * @return self
     */
    public static function continue(): self
    {
        return new static(SIGCONT);
    }


    /**
     * The SIGSTOP signal instructs the operating system to stop a process for later resumption.
     *
     * @return self
     */
    public static function stop(): self
    {
        return new static(SIGSTOP);
    }


    /**
     * The SIGTSTP signal is sent to a process by its controlling terminal to request it to stop (terminal stop).
     * It is commonly initiated by the user pressing Ctrl+Z. Unlike SIGSTOP, the process can register a signal
     * handler for or ignore the signal.
     *
     * @return self
     */
    public static function terminalStop(): self
    {
        return new static(SIGTSTP);
    }


    /**
     * The SIGTTIN and SIGTTOU signals are sent to a process when it attempts to read in or write out respectively
     * from the tty while in the background. Typically, these signals are received only by processes under job
     * control; daemons do not have controlling terminals and, therefore, should never receive these signals.
     *
     * @return self
     */
    public static function ttyIn(): self
    {
        return new static(SIGTTIN);
    }


    /**
     * The SIGTTIN and SIGTTOU signals are sent to a process when it attempts to read in or write out respectively
     * from the tty while in the background. Typically, these signals are received only by processes under job
     * control; daemons do not have controlling terminals and, therefore, should never receive these signals.
     *
     * @return self
     */
    public static function ttyOut(): self
    {
        return new static(SIGTTOU);
    }


    /**
     * The SIGURG signal is sent to a process when a socket has urgent or out-of-band data available to read.
     *
     * @return self
     */
    public static function urgent(): self
    {
        return new static(SIGURG);
    }
}
